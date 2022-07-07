@extends('adminlte::page')
@section('title', 'Open Ticket')
@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Abrir Novo Ticket</h3>
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
                <form class="form-horizontal" role="form" method="POST">
                    @csrf
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">Title</label>
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title"
                                value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                        <label for="category" class="col-md-4 control-label">Categoria</label>
                        <div class="col-md-6">
                            <select id="category" type="category" class="form-control" name="category">
                                <option value="">Selecione</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                        <label for="priority" class="col-md-4 control-label">Prioridade</label>
                        <div class="col-md-6">
                            <select id="priority" type="" class="form-control" name="priority">
                                <option value="">Selecione</option>
                                <option value="baixa">Baixa</option>
                                <option value="media">Média</option>
                                <option value="alta">Alta</option>
                            </select>
                            @if ($errors->has('priority'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('priority') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for="message" class="col-md-4 control-label">Ocorrência</label>
                        <div class="col-md-6">
                            <textarea rows="10" id="message" class="form-control" name="message"></textarea>
                            @if ($errors->has('message'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-ticket"></i> Abrir Ticket
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
