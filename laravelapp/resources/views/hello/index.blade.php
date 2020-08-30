<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <style>
        th {
            background-color: red;
            padding: 10px;
        }
        td {
            background-color: #eee;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Hello/Index</h1>
    <p>{!! $msg !!}</p>
    <form action="/hello" method="post">
        @csrf
        <div>NAME: <input type="text" name="name"></div>
        <div>MAIL: <input type="text" name="mail"></div>
        <div>TEL: <input type="text" name="tel"></div>
        <input type="submit">
    </form>
    <hr>
    <ol>
        @for($i = 0; $i < count($keys); $i++)
            <li>{{$keys[$i]}}:{{$values[$i]}}</li>
        @endfor
    </ol>
</body>
</html>
