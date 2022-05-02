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
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Rut</th>
                                        <th scope="col">Departamento</th>
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
    @include('users.modal')
@endsection

@section('js')
    <script>
        var table;

        $(function() {
            // Funcion renderizar datos data table
            table = $('#users').DataTable({
                processing: true,
                serverSide: true,
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
                lengthMenu: [5, 15, 30, 50]
            });

            // submit formulario
            $('#formSave').submit(function(e) {
                // previene que se recarge la pagina
                e.preventDefault();

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

                        // Limpiar formulario
                        $('#formSave')[0].reset();
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
                    }

                });
            });


        });
    </script>
@endsection
