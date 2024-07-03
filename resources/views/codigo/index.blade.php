@extends('layouts.app2')

@section('template_title')
    Codigo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Código') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('codigos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear') }}
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
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">id</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Codigos</th>
                              
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $curso)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$curso->nombre}}</td>
                                    <td>{{$curso->codigo->count()}}</td>
                                
                                  </tr>
                                @endforeach
                              
                              
                            </tbody>
                          </table>
                    </div>
                </div>
                {{-- {!! $codigos->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
