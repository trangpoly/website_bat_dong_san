@php
    $objUser = $objUser = \Illuminate\Support\Facades\Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <h3>Thông báo {{$emails['content']}}</h3>
    <p>Xin chào <strong>{{$objUser->name}}</strong></p>
</body>
</html>