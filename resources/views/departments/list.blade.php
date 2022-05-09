@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Listado de departamentos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Gestion de departamentos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <a class="btn btn-primary mb-3" href="#" data-toggle="modal" data-target="#modalSave">Crear Departamento</a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="departments" class="table table-bordered table-striped table-dark">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('departments.modal')
@endsection
@section('js')
    <script>
        // Limpiar errores de validacion
        function cleanFormErrors() {
            $('.small-validation').text('');
            $('.small-validation').css('display', 'none');
        }

        // Limpiar formulario
        function resetForm() {
            $('#formSave')[0].reset();
            $("#department_id").val('');
        }

        var table;

        $(function() {
            // Funcion renderizar datos data table
            table = $('#departments').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('departments.datatable') }}',
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
                        data: 'description',
                        searchable: true,
                        orderable: true
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

            $('#departments').on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                let url = "{{ route('departments.show', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(response) {
                        $('#department_id').val(response.id);
                        $('#name').val(response.name);
                        $('#description').val(response.description);

                        $('#modalSave').modal('show');
                    }
                });
            });

            $('#departments').on('click', '.btn-delete', function() {
                let id = $(this).data('id');
                let url = "{{ route('departments.delete', ':id') }}";
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
