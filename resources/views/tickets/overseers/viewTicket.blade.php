@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Ticket | </strong>{{ $ticket->user->name }}</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-info-circle"> </i>
                                                    Información
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <dl>
                                                    <dt style="font-size:115%; ">Asunto:</dt>
                                                    <dd>{{ $ticket->subject }}</dd>
                                                    <dt style="font-size:115%; ">Descripción:</dt>
                                                    <dd>{{ $ticket->description }}</dd>
                                                    <dt style="font-size:115%; ">Prioridad:</dt>
                                                    <dd>{{ $ticket->priority }}</dd>
                                                    <dt style="font-size:115%; ">Usuario:</dt>
                                                    <dd>{{ $ticket->user->name }}</dd>
                                                    <dt style="font-size:115%; ">Departamento:</dt>
                                                    <dd>{{ $ticket->user->department->name }}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Responsable</label>
                                            <select class="form-control">
                                                <option value="">{{$ticket->user->name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="status">Estado</label>
                                            @foreach ($statuses as $status)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="status" value="{{ $status->id }}" {{ ($ticket->status_id == $status->id) ? "checked" : ""}}>
                                                    <label class="form-check-label">{{ $status->name }}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr class="mt-2 mb-3"/>
                            <div class="timeline">
                                <div class="time-label">
                                    <span class="bg-blue">Comentarios</span>
                                </div>
                                <div>
                                    <i class="far fa-comments bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i>
                                            {{ $ticket->created_at->format('d/m/Y | H:i') }}</span>
                                        <h3 class="timeline-header">
                                            <strong>{{ $ticket->user->name }}</strong>
                                            |
                                            {{ $ticket->user->department->name }}</h3>
                                        <div class="timeline-body">
                                            {{ $ticket->description }}
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-sm">Responder</a>
                                            <a class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
