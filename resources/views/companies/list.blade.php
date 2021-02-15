@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-header">
                <a href="{{ url('companies/new') }}" class="btn btn-success">Adicionar Empresa</button></a>
                <a href="{{ url('home') }}" class="btn btn-primary">Voltar</button></a>
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Lista de Empresas</h4>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Empresa</th>
                          <th scope="col">UF</th>
                          <th scope="col">CNPJ</th>
                          <th scope="col">Editar</th>
                          <th scope="col">Deletar</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach( $companies as $company )

                        <tr>
                          <td>{{ $company->name }}</td>
                          <td>{{ $company->state }}</td>
                          <td>{{ $company->cnpj }}</td>
                          <td>
                           <a href="companies/{{ $company->id }}/edit" class="btn btn-info">Editar</button>
                          </td>
                          <td>
                                <form action="companies/delete/{{ $company->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Deletar</button>
                                </form>
                          </td>
                        </tr>

                    @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection