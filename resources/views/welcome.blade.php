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
    <div class="container">
        
        <div class="row" >
            <div class="col-h100">
                <div class="card text-center" style="margin-top: 20%;">
                    <div class="card-header">
                      Votaciones - Unidad Educativa Dominicana
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Ingrese el codigo para hacer el voto</h5>
                      <p class="card-text">ingrese el codigo de 5 digitos</p>
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
                      {{--      <a href="#" class="btn btn-primary">Votar</a> --}}
                     
                    </div>
                    <div class="card-footer text-muted">
                      {{date('Y-m-d')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>