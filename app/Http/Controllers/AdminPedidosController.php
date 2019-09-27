<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Status;
use Illuminate\Http\Request;
use App\Events\PedidoStatusChanged;

class AdminPedidosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'login']]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::with(['cliente', 'status'])->get();

        return view('admin.index', compact('pedidos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return view('show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $statuses = Status::all();
        $currentStatus = $pedido->status_id;

        return view('admin.edit', compact('pedido', 'statuses', 'currentStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $Pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'status_id' => 'required|numeric',
        ]);

        $pedido->status_id = $request->status_id;
        $pedido->save();

        event(new PedidoStatusChanged($pedido));

        return back()->with('message', 'Status do Pedido Atualizado!');
    }
}