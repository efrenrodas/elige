<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>error</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="alert alert-danger" role="alert">
        Codigo incorrecto <a href="{{route('welcome')}}" class="alert-link">Click aqui</a>.  para intentar nuevamente.
      </div>
</body>
</html>