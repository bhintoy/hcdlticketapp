<form id="formSave" action="{{ route('users.save')}}" method="post">
    <input type="hidden" name="user_id" id="user_id" value="">
    @csrf
    <div class="modal fade text-left" id="modalSave" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crear nuevo usuario</h4>
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
                            <label for="rut">Rut</label>
                            <input type="text" class="form-control" name="rut" placeholder="Ingrese rut" id="rut">
                            <small class="small-validation form-text text-danger error_rut" style="display: none;"></small>
                        </div>
                        <div class="form-group">
                            <label for="department_id">Departamento</label>
                            <select name="department_id" id="department_id" class="form-control">
                                <option value="" selected>Seleccione</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            <small class="small-validation form-text text-danger error_department_id" style="display: none;"></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Ingrese contraseña">
                            <small class="small-validation form-text text-danger error_password" style="display: none;"></small>
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
