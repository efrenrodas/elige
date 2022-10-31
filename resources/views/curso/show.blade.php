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
                            <span class="card-title">Show Curso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cursos.index') }}"> Back</a>
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
                            {{ $curso->estado }}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <table  class="table table-bordered border-primary table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Codigo</th>
									
                                        {{-- <th>Firma</th> --}}
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($codigos as $codigo)
                                    <tr>
                                        <td>{{ $loop->index }}</td>
                                        
                                        <td>{{ $codigo->codigo }}</td>
                                       {{-- <td>{{'__________________'}}</td> --}}
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
