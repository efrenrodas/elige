@extends('layouts.app2')

@section('template_title')
    {{ $codigo->name ?? 'Show Codigo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Editar codigo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cursos.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $codigo->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $codigo->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Id Curso:</strong>
                            {{ $codigo->id_curso }}
                        </div>
                       <form method="post" action="{{route('codigos.update', $codigo->id)}}" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                            @csrf
                            <div class="form-group">
                                {{ Form::label('estado') }}
                                {{-- {{ Form::text('estado', $codigo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }} --}}
                                <select class="form-control" name="estado" id="estado">
                                    <option {{$codigo->estado=='0'?'selected':''}}  value="0">Inactivo</option>
                                    <option {{$codigo->estado=='1'?'selected':''}} value="1">Creado</option>
                                    <option {{$codigo->estado=='2'?'selected':''}} value="2">Visto</option>
                                    <option {{$codigo->estado=='3'?'selected':''}} value="3">Usado</option>
                                </select>
                                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            &nbsp;
                            <div class="form-group">
                                
                                <input class="btn btn-primary" type="submit" value="Guardar">
                            </div>
                           
                       </form> 

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
