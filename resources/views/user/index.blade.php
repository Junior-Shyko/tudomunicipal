@extends('layouts.layout')

@section('title', 'Cadastro')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Lista de Usuário</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $users)
                            <tr>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            <td>{{$users->city_id}}</td>
                            <td>{{$users->state_id}}</td>
                            <td>
                                <a href="#" class="btn btn-primary" title="Editar" >
                                    <i class="fa fa-edit"></i>    
                                </a>
                                <a href="#" class="btn btn-danger" title=" Excluir ">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
    @include('modals.create')  
</div>
@endsection