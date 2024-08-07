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

         {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <title>Ingresa tu clave</title>
    </head>
<body>
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Realizar votación</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{route('welcome')}}"> Salir</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $codigo->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            @switch($codigo->estado)
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
                                                
                                        @endswitch
                        </div>
                        <div class="form-group">
                            <strong>Curso:</strong>
                            {{ $codigo->curso->nombre }}
                        </div>
                        @if ($codigo->estado>'2')
                        <div id="votado1">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                              </svg>
                              <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div>
                                  Ud ha registrado correctamente su voto
                                </div>
                              </div>
                        </div>
                        
                        @endif
                        <div id="btnVotar" class="row row-cols-1 row-cols-md-3 g-4">
                            @if ($codigo->estado=='1' or $codigo->estado=='2' )
                            @foreach ($listas as $lista)
                            <div class="col-md-3">
                                <div class="card">
                                  <img src="{{ asset('storage') . '/' .$lista->imagen }}" width="20%" height="300px" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <strong><h5 class="card-title">{{$lista->nombres}}</h5></strong>
                                    <p class="card-text">{{$lista->string}}</p>
                                  </div>
                                  
                                  {{-- <div id="btnVotar"> --}}
                                    <button type="button" class="btn btn-primary btn-lg" onclick="votar('{{$lista->id}}','{{$codigo->id}}')">Votar</button>

                                  {{-- </div> --}}
                                      
                                 
                                </div>
                            </div>
                            @endforeach
                            @endif
                            
                          
                           
                            
                        </div>
                        <div id="votado" style="display:none">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                              </svg>
                              <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div>
                                  Ud ha registrado correctamente su voto
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var lista='';
    let route='{{route("voto.realizar")}}';

    function votar(lista,usuario) {
        $.ajax({
                url:route,
                type:"POST",
                data:{
                    "id_lista":lista,
                    "id_codigo":usuario,
                    "_token": "{{ csrf_token() }}",
                },
                success:function(response){
                     $('#btnVotar').hide();
                     $('#votado').show();
                  console.log(response);
                    // $.each(response, function (key, value) {
                    // console.log(value.nombre);
                       // $('#id_subgrupo').append(new Option(value.nombre, value.id));
                    //    console.log(response);
                    //    $('#id_producto').val(response.id_item)
                    //    $('#prod').val(response.Nombre)
                    //    $('id_unidad').val(response.medida)
                    // });


                }
            });    
    }
    
</script>
</html>