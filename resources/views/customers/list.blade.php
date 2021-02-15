@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
              <a href="{{ url('customers/new') }}" class="btn btn-success">Adicionar Cliente</button></a>
              <a href="{{ url('home') }}" class="btn btn-primary">Voltar</button></a>
            </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Lista de Clientes</h2>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Empresa</th>
                          <th scope="col">Nome</th>
                          <th scope="col">CPF / CNPJ</th>
                          <th scope="col">Telefone</th>
                          <th scope="col">E-mail</th>
                          <th scope="col">Adicionado em:</th>
                          <th scope="col">Editar</th>
                          <th scope="col">Deletar</th>
                        </tr>
                      </thead>
                      <tbody>
                    @foreach( $customers as $customer )

                        <tr>
                          <td>{{ $customer->companies->name }}</td>
                          <td>{{ $customer->name }}</td>
                          <td>{{ $customer->document }}</td>
                          <td>{{ $customer->phone}}</td>
                          <td>{{ $customer->email }}</td>
                          <td>{{ date('d-m-Y', strtotime($customer->created_at)) }}</td>
                          <td>
                           <a href="customers/{{ $customer->id }}/edit" class="btn btn-info">Editar</button>
                          </td>
                          <td>
                                <form action="customers/delete/{{ $customer->id }}" method="post">
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