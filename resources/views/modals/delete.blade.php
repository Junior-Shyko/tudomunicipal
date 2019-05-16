<!-- Modal -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog  modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Deletar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('usuario/excluir')}}" method="post">
                @method('DELETE')
                
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <h5>Deseja realmente excluir esse usuário?</h5>
                        </div>
                    </div>
                    
                    @csrf
                    <input type="hidden" name="id" id="deleteUserId">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                <button type="submit" class="btn btn-danger">Sim</button>                
            </div>
            </form>
        </div>
    </div>
</div>