@extends('layouts.app')

@section('template_title')
    {{ $curso->name ?? 'Show Curso' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver codigos</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cursos.index') }}"> Atras</a>
                        </div>
                        &nbsp;
                        <div class="float-right">
                            <a class="btn btn-info" href="{{ route('codigos.crear',['id'=>$curso->id]) }}"> Crear</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $curso->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $curso->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $curso->estado=='1'?'activo':'Inactivo' }}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <table  class="table table-bordered border-primary table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Esdudiante</th>
										<th>Codigo</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($codigos as $codigo)
                                    <tr>
                                        <td>{{ $loop->index }}</td>
                                        <td>{{$codigo->nombres}}</td>
                                        <td>{{ $codigo->codigo }}</td>
                                        <td>@switch($codigo->estado)
                                            @case(0)
                                                Inactivo
                                                @break
                                            @case(1)
                                                Creado
                                                @break
                                                @case(2)
                                                Visto
                                                @break
                                                @case(3)
                                                Usado
                                                @break
                                            @default
                                                
                                        @endswitch</td>
                                       <td>
                                        <a href="{{route('codigos.show',$codigo->id)}}">Editar</a>
                                       </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
