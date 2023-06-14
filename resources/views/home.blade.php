@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{route('listas.index')}}" role="button">Listas</a>

        </div>
        <div class="col">
            <a class="disabled btn btn-primary" href="{{route('cursos.index')}}"  >Cursos</a>

        </div>
        <div class="col">
            <a class="btn btn-secondary disabled" href="{{route('codigos.index')}}">Codigos</a>

        </div>
        {{-- <div class="col">
            <a class="btn btn-success"href="{{route('codigovotos.index')}}">Resumen</a>

        </div> --}}
        <div class="col">
            <a class="btn btn-danger" href="{{route('home')}}">Inicio</a>

        </div>
        {{-- <a class="btn btn-warning" href="#">Warning</a>
        <a class="btn btn-info" href="#">Info</a>
        <a class="btn btn-light" href="#">Light</a>
        <a class="btn btn-dark" href="#">Dark</a>

        <a class="btn btn-link">Link</a> --}}
    </div>
</div>
@endsection
