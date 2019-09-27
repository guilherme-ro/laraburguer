@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-heading">Painel de Controle do Admin</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                @if ($pedidos->count() == 0)
                    <p>Nenhum pedido feito.</p>
                    <a class="btn btn-success" href="{{ route('user.pedidos.create') }}">Pedir um Lanche</a>

                @else

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Cadastro</th>
                                    <th>Nome do Cliente</th>
                                    <th>Endereço</th>
                                    <th>Tamanho</th>
                                    <th>Adicional</th>
                                    <th>Instruções</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedidos as $pedido)
                                    <tr>
                                        <td>{{ $pedido->id }}</td>
                                        <td>{{ $pedido->cliente->nome }}</td>
                                        <td>{{ $pedido->endereco }}</td>
                                        <td>{{ $pedido->tamanho }}</td>
                                        <td>{{ $pedido->adicional }}</td>
                                        <td>{{ $pedido->instrucoes }}</td>
                                        <td><a href="{{ route('admin.pedidos.edit', $pedido) }}">{{ $pedido->status->nome }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div> <!-- end table-responsive -->

                @endif




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
