@extends('layouts.layout')

@section('title', 'Cadastro')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
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
                            <td>{{$users->username}}</td>
                            <td>{{$users->email}}</td>
                            <td>{{$users->nameCity}}</td>
                            <td>{{$users->nameState}}</td>
                            <td>
                            <a href="{{url('usuario/'.$users->idUser.'/edit')}}" class="btn btn-primary" title="Editar" >
                                    <i class="fa fa-edit"></i>    
                                </a>
                                <a href="#" onclick="deleteUser({{$users->idUser}})" class="btn btn-danger" title=" Excluir ">
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
    @include('modals.delete')  
</div>
@endsection