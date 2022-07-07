@extends('adminlte::page')
@section('title', 'Administrar Tickets')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Administrar Tickets</h3>
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
                    @if ($tickets->isEmpty())
                        <p>Nâo há tickets no momento.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Título</th>
                                    <th>Status</th>
                                    <th>Última atualização</th>
                                    <th style="text-align:center" colspan="2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>
                                            {{ $ticket->category->name }}
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->ticket_id) }}">
                                                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                            </a>
                                        </td>
                                        <td>
                                            @if ($ticket->status === 'Aberto')
                                                <span class="badge bg-primary">{{ $ticket->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $ticket->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $ticket->updated_at }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                @if ($ticket->status === 'Aberto')
                                                    <a href="{{ url('tickets/' . $ticket->ticket_id) }}"><button
                                                            class="btn btn-success btn-sm"
                                                            type="button">Iterar</button></a>
                                                    <form action="{{ url('admin/fechar_ticket/' . $ticket->ticket_id) }}"
                                                        method="POST">
                                                        {!! csrf_field() !!}
                                                        <button type="submit" class="btn btn-danger btn-sm">Fechar</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
