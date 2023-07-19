<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
    <h2>{{$detail_info->title}}</h2>
    <a>{{$detail_info->content}}</a>
    <a>{{$detail_info->user_id}}</a>
    @foreach($detail_images as $detail_image)
        <img src="{{asset('storage/' . $detail_info->article_id . '/' . $detail_image->resource_id .'.'. $detail_image->mime)}}" width="250" height="200">
    @endforeach
    <form action="/posts/{{$detail_info->article_id}}/update" method="GET">
        <button type="submit">更新</button>
    </form>
    <form action="/posts/{{$detail_info->article_id}}/delete">
        <button type="submit">削除</button>
    </form>
    <form action="/posts">
        <button type="submit">記事一覧ページに戻る</button>
    </form>
</body>
</html>
