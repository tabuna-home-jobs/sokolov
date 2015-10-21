<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Files;
use App\Models\FilesMeta;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $file = Files::where('type', 'order')->findOrFail($id);

        //Берём связь хз почему но передать как метод не удалось
        $OrderId = $file->beglouto;
        $order = Order::findOrFail($OrderId);

        // Береём мета данные о расшаривание документа
        $filesMeta = FilesMeta::whereRaw('files_id = ? and user_id = ?', [$file->id, Auth::user()->id])->first();


        if ($file->user_id == Auth::user()->id ||
            $order->user_id == Auth::user()->id ||
            $order->userword_id == Auth::user()->id ||
            !is_null($filesMeta)
        ) {
            return response()->download(storage_path() . '/app/order/' . $file->name);
        } else {
            abort(404);
        }

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
