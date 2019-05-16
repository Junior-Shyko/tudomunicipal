@extends('layouts.layout')
@section('title', 'Cadastro')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">{{$user->username}}</h5>
            </div>
        <form action="{{url('usuario/'.$user->idUser)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Nome</label>
                            <input type="text" class="form-control" name="name" value="{{$user->username }}">
                        </div>
                        <div class="form-group">
                            <label >CPF</label>
                            <input type="text" class="form-control" id="number-cpf" name="cpf"  value="{{$user->cpf }}" placeholder="___.___.___-__">
                        </div>
                        <div class="form-group">
                            <label >Data Nascimento</label>
                            <input type="text" class="form-control" id="birth-date" name="birth" value="{{$user->birth }}" placeholder="__/__/____">
                        </div>
                        <div class="form-group">
                            <label >E-mail</label>
                            <input type="email" class="form-control" name="email"  value="{{$user->email }}" placeholder="Seu e-mail">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Telefone</label>
                            <input type="text" class="form-control" name="phone" id="phone-number" value="{{$user->phone }}" placeholder="Número celular">
                        </div>
                        <div class="form-group">
                            <label >Endereço</label>
                            <input type="text" class="form-control" name="address" value="{{$user->address }}" placeholder="Endereço completo">
                        </div>
                        <div class="form-group">
                            <label >Estado</label>
                            <select name="state_id" id="selectState" class="form-control">
                                <option value="">{{$user->nameState }}</option>
                                <option value="">--Selecione</option>
                                @foreach ($state as $states)
                                <option value="{{$states->id}}">{{$states->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Cidade</label>
                            <div id="loadCity"> <img src="{{url('img/25.gif')}}" alt="" width="16"> </div>
                            <select name="city_id" id="selectCity" class="form-control">
                                <option value="">--Selecione</option>
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Alterar
                    <i class="fa fa-edit"></i>
                    </button> 
                </div>
            </div>
        </form>
        </div>
    </div>
    @include('modals.create')  
</div>
@endsection