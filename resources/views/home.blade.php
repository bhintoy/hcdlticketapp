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
                <div class="col-sm-3">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-utensils"> </i>
                                Menu del dia
                            </h3>
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
                <div class="col-sm-6">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-utensils"> </i>
                                Menu del dia
                            </h3>
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
@endsection
