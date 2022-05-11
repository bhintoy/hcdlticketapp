@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Listado de usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Gestion de usuarios</li>
                    </ol>
                </div>
            </div>
            <hr class="mt-2 mb-3"/>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <a class="btn btn-primary mb-3" href="#" data-toggle="modal" data-target="#modalSave">Crear Usuario</a>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="users" class="table table-bordered table-striped table-dark">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Rut</th>
                                        <th>Departamento</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('users.modal')
@endsection

@section('js')
    <script src="{{ asset('js/rutvalidator.js') }}"></script>
    <script>
        // Limpiar errores de validacion
        function cleanFormErrors() {
            $('.small-validation').text('');
            $('.small-validation').css('display', 'none');
        }

        // Limpiar formulario
        function resetForm() {
            $('#formSave')[0].reset();
            $("#user_id").val('');
        }

        var table;

        $(function() {
            // select2
            $('.select2Custom').select2({
                placeholder: "Seleccione una opcion",
                allowClear: true
            });

            // rut formateo
            $('#rut').rut();

            // Funcion renderizar datos data table
            table = $('#users').DataTable({
                processing: true,
                serverSide: true,
                columnDefs: [{
                    "className": "dt-center",
                    "targets": "_all"
                }],
                ajax: {
                    url: '{{ route('users.datatable') }}',
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    }
                },
                columns: [{
                        data: 'id',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'name',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'rut',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'department.name',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'actions',
                        searchable: false,
                        orderable: false
                    },
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                lengthMenu: [10, 20, 35, 50]
            });

            // submit formulario
            $('#formSave').submit(function(e) {
                // previene que se recarge la pagina
                e.preventDefault();

                cleanFormErrors();

                let url = $(this).attr('action');
                let data = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function(response) {
                        // mostrar el toast
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: response.message
                        });

                        // Ocultar modal
                        $('#modalSave').modal('hide');

                        // Actualizar dataTable
                        table.draw();

                        cleanFormErrors();
                        resetForm();

                    },
                    error: function(response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'error',
                            title: 'Se encontraron errores'
                        });

                        var errors = response.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            var className = '.error_' + index;

                            $(className).text(value);
                            $(className).css('display', 'block');
                        });
                    }

                });
            });

            $('#modalSave').on('hidden.bs.modal', function(event) {
                cleanFormErrors();
                resetForm();
            });

            $('#users').on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                let url = "{{ route('users.show', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(response) {
                        $('#user_id').val(response.id);
                        $('#name').val(response.name);
                        $('#rut').val(response.rut);
                        $('#department_id').val(response.department_id);

                        $('#modalSave').modal('show');
                    }
                });
            });

            $('#users').on('click', '.btn-delete', function() {
                let id = $(this).data('id');
                let url = "{{ route('users.delete', ':id') }}";
                url = url.replace(':id', id);

                Swal.fire({
                    title: '¿Seguro quieres eliminar este registro?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, Eliminalo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    icon: 'success',
                                    title: response.message
                                });
                                table.draw();
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
