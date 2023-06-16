@extends('layouts.app')

@section('template_title')
    Crear Codigos
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Codigos</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('codigos.guardar') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                           <div class="form-group">
                                {{ Form::label('codigo') }}
                                <input type="text" name="codigo" id="codigo" class="form-control">
                                {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <input type="hidden" name="idCurso" value="{{$id}}">
                            <input type="submit" value="Guardar" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
