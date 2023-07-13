<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
<form action="/posts/{{$article_id}}/update" method="POST">
    @method('PUT')
    @csrf
    <input type="text" name="update_title" placeholder="titleの更新">
    <input type="text" name="update_content" placeholder="contentの更新">
    <button type="submit">更新</button>
</form>
</body>

</html>
