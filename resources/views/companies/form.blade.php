@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <a href="{{ url('companies') }}" class="btn btn-primary">Voltar</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    @if( Request::is('*/edit'))
                    <form action="{{ url('companies/update') }}/{{ $companies->id }}" method="post">
                    @csrf
                    <div class="form-group">
                            <label for="exampleInputEmail1">Nome:</label>
                            <input type="text" name="name" class="form-control" value="{{ $companies->name }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">UF</label>
                            <input type="text" name="state" class="form-control" value="{{ $companies->state }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">CNPJ:</label>
                            <input type="text" name="cnpj" class="form-control" value="{{ $companies->cnpj }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>

                    @else

                    <form action="{{ url('companies/add') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome:</label>
                            <input type="text" name="name" class="form-control">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">UF:</label>
                            <input type="text" name="state" class="form-control">
                            <span class="text-danger">{{ $errors->first('state') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">CNPJ:</label>
                            <input type="text" name="cnpj" class="form-control">
                            <span class="text-danger">{{ $errors->first('cnpj') }}</span>
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                        @endif
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
