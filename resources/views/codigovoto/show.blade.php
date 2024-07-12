@extends('layouts.app2')

@section('template_title')
    {{ $codigovoto->name ?? 'Show Codigovoto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"> Reporte con corte: </span>
                            <strong>{{$horario}}</strong>
                        </div>
                        {{-- <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('home') }}"> Atras</a>
                        </div> --}}
                    </div>

                    <div  class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Lista</th>
                                <th scope="col">Votos</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($listas as $lista)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$lista->nombres}}</td>
                                    <td>{{$lista->votos}}</td>
                                  
                                  </tr> 
                                @endforeach
                             <tr>
                                <th>Total</th>
                                <th> </th>
                                <th>{{$total}}</th>
                             </tr>
                              
                            </tbody>
                          </table>
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
