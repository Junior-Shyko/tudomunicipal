<!-- Modal de criação de usuário-->
<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Novo Cadastro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/" method="POST" id="formSaveUser">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Nome</label>
                        <input type="text" class="form-control" name="name" placeholder="Nome completo">
                    </div>
                    <div class="form-group">
                        <label >CPF</label>
                        <input type="text" class="form-control" id="number-cpf" name="cpf" placeholder="___.___.___-__">
                    </div>
                    <div class="form-group">
                        <label >Data Nascimento</label>
                        <input type="text" class="form-control" id="birth-date" name="birth" placeholder="__/__/____">
                    </div>
                    <div class="form-group">
                        <label >E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Seu e-mail">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Telefone</label>
                        <input type="text" class="form-control" name="phone" id="phone-number" placeholder="Número celular">
                    </div>
                    <div class="form-group">
                        <label >Endereço</label>
                        <input type="text" class="form-control" name="address" placeholder="Endereço completo">
                    </div>
                    <div class="form-group">
                        <label >Estado</label>
                        <select name="state_id" id="selectState" class="form-control">
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
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Sair</button>
            <button type="button" id="btn_save" class="btn btn-primary"> Salvar
                <i class="fa fa-save"></i>
            </button>
        </div>
        </div>
    </div>
</div>