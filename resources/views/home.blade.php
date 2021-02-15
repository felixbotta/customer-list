@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Painel de Controle</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Seja Bem-vindo(a)</4>
                    <a href="{{ url('companies') }}" class="btn btn-primary">Visualizar Empresas</button></a>
                    <a href="{{ url('customers') }}" class="btn btn-success">Visualizar Clientes</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
