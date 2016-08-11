<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Files;
use App\Models\LangOrder;
use App\Models\MetaOrder;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Orders = Auth::user()->getOrders()->sortable()->orderBy('id', 'Desc')->simplePaginate(15);

        return view('site.allOrder', [
            'Orders' => $Orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //Отдаём категорию в зависимости от языка
        if (App::getLocale() == 'ru') {
            //$type = Category::lists('id', 'name')->with('getCategory')->get();
            $langTrans = LangOrder::lists('id', 'name');
        } else {
            //$type = Category::lists('id', 'eng_name');
            $langTrans = LangOrder::lists('id', 'eng_name');
        }
        $type = Category::with('goods')->get();
        return view('site.createOrder', [
            'type' => $type,
            'langTrans' => $langTrans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $newOrder = new Order([
            'user_id' => Auth::user()->id,
            'status' => 'На оценке',
            'name' => $request->name,
            'text' => $request->text,
            'izdanie' => $request->izdanie,
            'LangOrder_id' => $request->langOrder_id,
        ]);

        $newOrder->save();

        foreach ($request->type as $type) {
            MetaOrder::create([
                'order_id' => $newOrder->id,
                'category_id' => $type['id'],
                'speed' => (isset($type['speed'])) ? $type['speed'] : '',
            ]);
        }
        foreach ($request->file('files') as $file) {
            if (!is_null($file)) {
                if (!Storage::exists('/app/order/'.date('Y-m-d'))) {
                    Storage::makeDirectory('/app/order/'.date('Y-m-d'));
                }

                $file->move(storage_path().'/app/order/'.date('Y-m-d'), Str::ascii(time().'-'.$file->getClientOriginalName()));
                $DBfile = new Files([
                    'user_id' => Auth::user()->id,
                    'original' => $file->getClientOriginalName(),
                    'name' => date('Y-m-d').'/'.Str::ascii(time().'-'.$file->getClientOriginalName()),
                    'type' => 'order',
                    'beglouto' => $newOrder->id,
                    'finish' => false,
                ]);
                $DBfile->save();
            }
        }

        // event(new NewOrder($newOrder->id));
        Session::flash('good', trans('alert.Thank you for writing, we will respond to you.'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $Order = Auth::User()->getOrders()->findOrFail($id);
        $SelectComments = Comments::whereRaw('type = ? and beglouto = ?', ['order', $id])->get();

        $OrderMeta = $Order->getGoods()->get();

        $collectionGoods = [];

        foreach ($OrderMeta as $value) {
            $value->category->speed = $value->speed;
            array_push($collectionGoods, $value->category);
        }

        $SelectGoodFile = Files::select('id', 'original', 'created_at')
            ->whereRaw('type = ? and beglouto = ? and finish = ?', ['order', $id, true])->get();

        $SelectRequestFile = Files::select('id', 'original', 'created_at')
            ->whereRaw('type = ? and beglouto = ? and finish = ?', ['order', $id, false])->get();

        return view('site.showOrder', [
            'Order' => $Order,
            'SelectComments' => $SelectComments,
            'SelectGoodFile' => $SelectGoodFile,
            'SelectRequestFile' => $SelectRequestFile,
            'collectionGoods' => $collectionGoods,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        foreach ($request->file('files') as $file) {
            if (!is_null($file)) {
                if (!Storage::exists('/app/order/'.date('Y-m-d'))) {
                    Storage::makeDirectory('/app/order/'.date('Y-m-d'));
                }

                $file->move(storage_path().'/app/order/'.date('Y-m-d'), Str::ascii(time().'-'.$file->getClientOriginalName()));
                $DBfile = new Files([
                    'user_id' => Auth::user()->id,
                    'original' => $file->getClientOriginalName(),
                    'name' => date('Y-m-d').'/'.Str::ascii(time().'-'.$file->getClientOriginalName()),
                    'type' => 'order',
                    'beglouto' => $id,
                    'finish' => false,
                ]);
                $DBfile->save();
            }
        }
        Session::flash('good', 'Файлы успешно загружены');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
