<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    </head>
    <body>
        <h1>記事一覧</h1>
        @if(Illuminate\Support\Facades\Session::has('name'))
            <h3>{{Illuminate\Support\Facades\Session::get('name')}}さんがログインしています</h3>
        @else
            <h3>ログインしていません</h3>
        @endif
        <button type="button" onclick="location.href='/register'">登録フォームはこちら</button>
        <button type="button" onclick="location.href='/login'">ログインフォームはこちら</button>
        <button type="button" onclick="location.href='/logout'">ログアウトはこちらをクリック</button>
        <form action="/posts" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="タイトル">
            <input type="text" name="content" placeholder="テキスト">
            <input type='file' id='images' name='images[]' accept='image/*' multiple>
            <h5 class='image-attribute'></h5>

            <button type="submit">投稿</button>
            <script src="{{ asset('/js/ImageNameDisplay.js') }}"></script>
        </form>
        @if(isset($error))
            <h4>{{$error}}</h4>
        @endif

        @if(isset($articles))
            @foreach($articles as $article)
                <h2><a href="posts/{{$article->article_id}}">{{  $article->title }}</a></h2>
                <p>{{  $article->content }}</p>
                <p>{{  $article->user_id }}</p>
            @endforeach
        @endif
    </body>
</html>
