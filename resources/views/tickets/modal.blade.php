<form id="formSave" action="{{ route('tickets.save') }}" method="post">
    <input type="hidden" name="ticket_id" id="ticket_id" value="">
    @csrf
    <div class="modal fade text-left" id="modalSave" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crear ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="priority">Prioridad</label>
                            <select name="priority" id="priority" class="form-control">
                                <option value="" selected>Seleccione una opcion</option>
                                <option value="Baja">Baja</option>
                                <option value="Media">Media</option>
                                <option value="Alta">Alta</option>
                            </select>
                            <small class="small-validation form-text text-danger error_priority"
                                style="display: none;"></small>
                        </div>
                        <div class="form-group">
                            <label for="department_id">Departamento</label>
                            <select name="department_id" id="department_id" class="form-control">
                                <option value="" selected>Seleccione una opcion</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            <small class="small-validation form-text text-danger error_department_id"
                                style="display: none;"></small>
                        </div>
                        <div class="form-group">
                            <label for="subject">Asunto</label>
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Ingrese asunto">
                            <small class="small-validation form-text text-danger error_subject"
                                style="display: none;"></small>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea class="form-control" rows="3" placeholder="Describe tu problema" id="description"
                                name="description"></textarea>
                            <small class="small-validation form-text text-danger error_description"
                                style="display: none;"></small>
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
