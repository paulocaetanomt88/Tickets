@extends('adminlte::page')
@section('title', 'Meus Tickets')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Meus Tickets</h3>
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
                        <p>Você ainda não abriu nenhum ticket.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Título</th>
                                    <th>Status</th>
                                    <th>Última atualização</th>
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
                                            @if ($ticket->status == 'Aberto')
                                                <span class="label label-success">{{ $ticket->status }}</span>
                                            @else
                                                <span class="label label-danger">{{ $ticket->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $ticket->updated_at }}
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
