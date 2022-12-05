<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('js/app.js')
    @vite('css/app.css')
</head>
<body>

@foreach($query as $q)

    <h6>{{$q->name}}</h6>
@endforeach
</body>
</html>
