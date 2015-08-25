<?php

namespace App\Http\Controllers\Site;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Files;
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
        $Orders = Auth::user()->getOrders()->orderBy('id', 'Desc')->simplePaginate(15);
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
            $type = Category::lists('id', 'name');
        } else {
            $type = Category::lists('id', 'eng_name');
        }


        return view('site.createOrder', [
            'type' => $type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $newOrder = new Order([
            'user_id' => Auth::user()->id,
            'status' => 'Обрабатываеться',
            'name' => $request->name,
            'text' => $request->text,
            'izdanie' => $request->izdanie,
        ]);

        $newOrder->save();

        foreach ($request->type as $type) {
            MetaOrder::create([
                'order_id' => $newOrder->id,
                'category' => $type
            ]);
        }

        foreach ($request->file('files') as $file) {

            if (!Storage::exists('/app/order/' . date("Y-m-d"))) {
                Storage::makeDirectory('/app/order/' . date("Y-m-d"));
            }

            $file->move(storage_path() . '/app/order/' . date("Y-m-d"), Str::ascii(time() . '-' . $file->getClientOriginalName()));
            $DBfile = new Files([
                'user_id' => Auth::user()->id,
                'original' => $file->getClientOriginalName(),
                'name' => date("Y-m-d") . '/' . Str::ascii(time() . '-' . $file->getClientOriginalName()),
                'type' => 'order',
                'beglouto' => $newOrder->id,
                'finish' => false,
            ]);
            $DBfile->save();
        }

        Session::flash('good', 'Спасибо, что написали, мы обязательно ответим вам.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
