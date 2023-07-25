<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    </head>
    <body>
        <h1>記事一覧</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
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

            @if(isset($tag_list))
                <select name="tags[]" multiple>
                @foreach($tag_list as $tag)
                    <option value={{$tag->tag_id}}>{{$tag->tagname}}</option>
                @endforeach
                </select>
            @endif

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
                <p>{{  $article->username }}</p>
                @if($article-> thumbnail_image_id)
                    @if(asset('storage/thumbnail/' . $article->article_id . '/' . $article->thumbnail_image_id . '.jpg'))
                        <img src="{{asset('storage/thumbnail/' . $article->article_id . '/' . $article->thumbnail_image_id .'.jpg')}}" width="250" height="200">
                    @elseif(asset('storage/thumbnail/' . $article->article_id . '/' . $article->thumbnail_image_id . '.png'))
                        <img src="{{asset('storage/thumbnail/' . $article->article_id . '/' . $article->thumbnail_image_id .'.png')}}" width="250" height="200">
                    @endif
                @endif
            @endforeach
        @endif
    </body>
</html>
