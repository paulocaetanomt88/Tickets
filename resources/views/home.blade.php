@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tickets de Suporte</h3>
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
            <div class="panel panel-default">
                <div class="panel-body">

                    @if (Auth::user()->is_admin)
                        <p>
                            Ver todos <a href="{{ url('admin/tickets') }}">tickets</a> ou <a
                                href="{{ url('novo-ticket') }}">abrir novo ticket</a>
                        </p>
                    @else
                        <p>
                            Ver meus <a href="{{ url('meus-tickets') }}">tickets</a> ou <a
                                href="{{ url('novo-ticket') }}">abrir novo ticket</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            j2A Tickets
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
