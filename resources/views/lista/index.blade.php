@extends('layouts.app')

@section('template_title')
    Lista
@endsection

@section('content')
<style type="text-css">
  
/* app.css | http://127.0.0.1:8000/css/app.css */

.img-fluid {
  /* max-width: 100%; */
  max-width: 10%;
}

</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lista') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('listas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombres</th>
										<th>Imagen</th>
										<th>Integrantes</th>
                                        <th>Votos</th>
                                      
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listas as $lista)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $lista->nombres }}</td>
											<td><img class="img-thumbnail" 	width="304" height="236" src="{{ asset('storage') . '/' .$lista->imagen }}" alt="" srcset=""></td>

											{{-- <td>{{ $lista->imagen }}</td> --}}
											<td>{{ $lista->string }}</td>
                                            <td>{{$lista->codigovoto->count()}}</td>
                                           
                                            <td>
                                                <form action="{{ route('listas.destroy',$lista->id) }}" method="POST">
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('listas.show',$lista->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    <a class="btn btn-sm btn-success" href="{{ route('listas.edit',$lista->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" disabled class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="alert alert-primary" role="alert">
                                Ausentes:{{$ausentes}}
                              </div>
                        </div>
                    </div>
                </div>
                {!! $listas->links() !!}
            </div>
        </div>
    </div>
@endsection
