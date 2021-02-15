@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <a href="{{ url('customers') }}" class="btn btn-primary">Voltar</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    @if( Request::is('*/edit'))
                    <form action="{{ url('customers/update') }}/{{ $customers->id }}" method="post">
                    @csrf

                    <form action="{{ url('customers/add') }}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label for="">Empresa:</label>
                            <select name="company" class="form-control" value="{{ $customers->company }}">>

                            @foreach($companies as $company)

                            <option value="{{ $company->id }}">{{ $company->name }}</option>

                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome:</label>
                            <input type="text" name="name" class="form-control" value="{{ $customers->name }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">CPF /  CNPJ:</label>
                            <input type="text" name="document" class="form-control" value="{{ $customers->document }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Data de Nascimento:</label>
                            <input type="date" name="birth_date" class="form-control" value="{{ $customers->birth_date }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefone:</label>
                            <input type="text" name="phone" class="form-control" value="{{ $customers->phone }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Celular:</label>
                            <input type="text" name="cel_phone" class="form-control" value="{{ $customers->cel_phone }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail:</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $customers->email  }}">
                        </div>

                      <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>

                    @else

                    <form action="{{ url('customers/add') }}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label for="">Empresa:</label>
                            <select name="company" class="form-control">

                            @foreach($companies as $company)

                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                            
                            @endforeach
                            </select>   
                        </div>

                         <div class="form-group">
                            <label for="exampleInputEmail1">Nome:</label>
                            <input type="text" name="name" class="form-control">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">CPF /  CNPJ:</label>
                            <input type="text" name="document" class="form-control">
                            <span class="text-danger">{{ $errors->first('document') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Data de Nascimento:</label>
                            <input type="date" name="birth_date" class="form-control">
                            <span class="text-danger">{{ $errors->first('birth_date') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefone Fixo:</label>
                            <input type="text" name="phone" class="form-control">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Celular:</label>
                            <input type="text" name="cel_phone" class="form-control">
                            <span class="text-danger">{{ $errors->first('cel_phone') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail:</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
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
