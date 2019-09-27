@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-heading">Rastreio de Pedidos</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <order-progress status="{{ $pedido->status->nome}}" initial=" {{ $pedido->status->porcentagem }}" pedido_id="{{ $pedido->id }}"></order-progress>

                    <order-alert user_id="{{ auth()->user()->id }}"></order-alert>



                    <hr>

                    <div class="order-details">
                        <strong>Pedido Número:</strong> {{ $pedido->id }} <br>
                        <strong>Tamanho:</strong> {{ $pedido->tamanho }} <br>
                        <strong>Adicional:</strong> {{ $pedido->adicional }} <br>

                        @if ($pedido->instrucoes != '')
                            <strong>Instruções:</strong> {{ $pedido->instrucoes }}
                        @endif

                    </div>

                    <a class="btn btn-primary" href="{{ route('user.pedidos') }}">Voltar</a>

                </div> <!-- end panel-body -->
            </div> <!-- end panel -->
        </div>
    </div>
</div>
@endsection