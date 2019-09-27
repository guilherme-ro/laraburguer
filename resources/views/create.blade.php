@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-heading">Pedir Lanche</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <order-alert user_id="{{ auth()->user()->id }}"></order-alert>

                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="{{ route('user.pedidos.store') }}" class="form-horizontal">
                                {{ csrf_field() }}

                                <div class="form-group"><label class="col-sm-2 control-label">Endereço</label>
                                    <div class="col-sm-10"><input type="text" name="endereco" placeholder="Seu Endereço" class="form-control"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Tamanho</label>

                                    <div class="col-sm-10">
                                        <div><label> <input type="radio" checked="" value="medium" id="medium" name="tamanho"> Médio </label></div>
                                        <div><label> <input type="radio" value="large" id="large" name="tamanho"> Grande </label></div>
                                        <div><label> <input type="radio" value="extra-large" id="extra-large" name="tamanho"> Tamanho Família </label></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Adicional</label>
                                    <div class="col-sm-10">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="adicional[]" value="bacon" id="bacon"> Bacon
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="adicional[]" value="calabreza" id="calabreza"> Calabreza
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="adicional[]" value="cheddar" id="cheddar"> Cheddar
                                        </label>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Instruções</label>

                                    <div class="col-sm-10"><input type="text" name="instrucoes" placeholder="Instruções Especiais" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-success" type="submit">Concluir Pedido</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
