@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <p>Bienvenido al sistema de elecciones </p>
        </div>
        {{-- <div class="col">
            <a class="btn btn-primary" href="{{route('listas.index')}}" role="button">Listas</a>

        </div> --}}
        
      {{-- @if (auth()->user()->rol=='admin')
        <div class="col">
            <a class="btn btn-primary" href="{{route('cursos.index')}}"  >Cursos</a>

        </div>

      <div class="col">
        <a class="btn btn-secondary enabled" href="{{route('codigos.index')}}">Codigos por carreras</a>

    </div> 
      @endif --}}
        
       
        {{-- <div class="col">
            <a class="btn btn-secondary" href="{{route('codigos.index')}}">Codigos</a>

        </div> --}}
        {{-- <div class="col">
            <a class="btn btn-success"href="{{route('codigovotos.index')}}">Reporte</a>

        </div> --}}
        {{-- <div class="col">
            <a class="btn btn-success"href="{{route('junta.cierre')}}">Reporte 2</a>

        </div>
        <div class="col">
            <a class="btn btn-success"href="{{route('codigovotos.index')}}">Votos</a>

        </div>
        <div class="col">
            <a class="btn btn-danger" href="{{route('home')}}">Inicio</a>

        </div> --}}
        {{-- <a class="btn btn-warning" href="#">Warning</a>
        <a class="btn btn-info" href="#">Info</a>
        <a class="btn btn-light" href="#">Light</a>
        <a class="btn btn-dark" href="#">Dark</a>

        <a class="btn btn-link">Link</a> --}}
    </div>
</div>
@endsection
