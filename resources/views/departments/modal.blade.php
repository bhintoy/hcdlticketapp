<form id="formSave" action="{{ route('departments.save')}}" method="post">
    <input type="hidden" name="department_id" id="department_id" value="">
    @csrf
    <div class="modal fade text-left" id="modalSave" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crear nuevo departamento</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre">
                            <small class="small-validation form-text text-danger error_name" style="display: none;"></small>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <input type="text" class="form-control" name="description" placeholder="Ingrese descripcion" id="description">
                            <small class="small-validation form-text text-danger error_rut" style="display: none;"></small>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="button" class="btn grey btn-primary" data-dismiss="modal">Volver</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
