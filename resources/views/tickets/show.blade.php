@extends('adminlte::page')
@section('title', $ticket->title)

@section('content_header')

@stop
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">#{{ $ticket->ticket_id }} - {{ $ticket->title }}</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="badge badge-primary">
                    @if (Auth::user()->is_admin)
                        Administrador
                    @else
                        Usuário
                    @endif
                </span>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="ticket-info">
                    <p>{{ $ticket->message }}</p>
                    <p><b>Categoria:</b> {{ $ticket->category->name }}</p>
                    <p>
                        @if ($ticket->status === 'Aberto')
                            <b>Status:</b> <span class="label label-success">{{ $ticket->status }}</span>
                        @else
                            <b>Status:</b> <span class="label label-danger">{{ $ticket->status }}</span>
                        @endif
                    </p>
                    <p><b>Criado em:</b> {{ $ticket->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <hr>
            @include('tickets.comments')
            <hr>
            @include('tickets.reply')
        </div>
    </div>
@endsection
