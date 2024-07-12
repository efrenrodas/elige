<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Ingresa tu clave</title>
    </head>
<body>
    <div class="container-fluid">
       
        <div class="row" >
          <img class="logo"  src="https://est2.sanisidro.edu.ec/logoblanco2.png" alt="">
        
            <div class="col-md-6 mx-auto">
            <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;"> 
                <div class="card text-center opacity-75" style="margin-top: 15%;">
                    <div class="card-header">
                      Elecciones - Instituto Tecnológico Universitario San Isidro
                    </div>
                    @if ($disponible=='true')
                    <div class="card-body">
                      <h5 class="card-title">Jornada {{$horario->nombre??''}}</h5>
                      <p class="card-text">Ingrese el código para realizar el voto</p>
                      <div class="row">
                        <div class="col">

                        </div>
                        <div class="col">
                            <form action="{{route('codigos.validate')}}" method="get">
                                <input type="text" class="form-control" name="codigo" id="codigo">
                           
                                <input class="btn btn-lg btn-primary" style="margin-top: 15px;" type="submit" value="Votar">
                            </form>
                        </div>
                        <div class="col">

                        </div>
                        
                      </div>
                      {{--      <a href="#" class="btn btn-primary">Vota</a> --}}
                     
                    </div>
                    @else
                    <div class="card-body">
                      <h5>La jornada no esta disopnible</h5>
                    </div>
                    @endif
                  
                    <div class="card-footer text-muted">
                      {{date('Y-m-d H:i:s')}}
                    </div>
                </div>
            </div>
            </div>
            
        </div>
        
    </div>
    
</body>
<style>
html, body {
  height: 100vh; /* Asegura que el contenedor ocupe el 100% de la altura de la ventana */
  margin: 0;
}

body {
  background-image: linear-gradient(to bottom,  #ADD8E6,#0c76a0);
  opacity: 1;
  position: relative;
  overflow: scroll;
  background-size: cover;
  background-repeat: no-repeat;
}

        .sectionOne { 
            /* background-image: url(https://i.ibb.co/mC2rJCX/fondo1.jpg);  */
            width: 100%; 
            height: 100%; 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center; 
            background-size: 100% auto; 
            background-attachment: fixed; 
        }


</style>
</html>