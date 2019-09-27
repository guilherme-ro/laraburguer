<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;

class UserPedidosController extends Controller
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
        $user = auth()->user();
        $pedidos = Pedido::with('status')->where('user_id', $user->id)->get();

        return view('index', compact('user', 'pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'endereco' => 'required',
            'tamanho' => 'required',
        ]);

        $pedido = Pedido::create([
            'user_id' => auth()->user()->id,
            'endereco' => $request->endereco,
            'tamanho' => $request->tamanho,
            'adicional' => implode(', ', $request->adicional),
            'instrucoes' => $request->instrucoes,
        ]);

        return redirect()->route('user.pedidos.show', $order)->with('message', 'Pedido Efetuado!');
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
}