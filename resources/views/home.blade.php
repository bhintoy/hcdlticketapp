@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Inicio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div>
            </div>
        </div>
        <hr class="mt-2 mb-3" />
    </div>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <!-- Noticias -->
                <div class="col-sm-8">
                    <div class="card card-row card-default">
                        <div class="card-header bg-info">
                            <h3 class="card-title">
                                <i class="far fa-newspaper"> </i>
                                Avisos importantes
                            </h3>
                        </div>
                        <!-- each noticia -->
                        <div class="card-body">
                            <div class="card card-warning card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Reunion importante</h5>
                                    <div class="card-tools">
                                        <span>12/05/2022</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>
                                        Se convoca a todo el personal a una importante reunion hoy en el
                                        salon petrohue desde las 16:00hrs a las 17:30hrs...
                                        <br>
                                        <br>
                                        asistencia obligatoria
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu del dia -->
                <div class="col-sm-4">
                    <div class="card card-row card-default">
                        <div class="card-header bg-info">
                            <h3 class="card-title">
                                <i class="fas fa-utensils"> </i>
                                Menu del dia
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Almuerzo</h5>
                                    <div class="card-tools">

                                    </div>
                                </div>
                                <div class="card-body">
                                    <dl>
                                        <dt style="font-size:115%; ">Plato principal:</dt>
                                        <dd>Pastel de papas</dd>
                                        <dt style="font-size:115%; ">Ensaladas:</dt>
                                        <dd>Pepinos | Tomates | choclos</dd>
                                        <dt style="font-size:115%; ">Bebestibles:</dt>
                                        <dd>Agua | Juego de naranja</dd>
                                        <dt style="font-size:115%; ">Postre</dt>
                                        <dd>Manzana | Platano</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col sm-12">
                    <div class="card card-row card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-phone"></i>
                                Anexos
                            </h3>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <a href="{{ route('tickets.show', 'id') }}">mostrar</a>
@endsection
