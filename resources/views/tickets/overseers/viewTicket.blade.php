@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="timeline">
                        <div class="time-label">
                            <span class="bg-red">{{ $ticket->subject}}</span>
                        </div>
                        <div>
                            <i class="fas fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> {{ $ticket->created_at}}</span>
                                <h3 class="timeline-header"><strong>{{ $ticket->user->department->name}}</strong> | {{ $ticket->user->name}}</h3>
                                <div class="timeline-body">
                                    {{ $ticket->description}}
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
@endsection
