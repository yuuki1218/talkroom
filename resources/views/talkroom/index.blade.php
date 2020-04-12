@extends('layouts.front')
@section('title', 'Room')
@section('content')
    <div class="container">
        <div class="row">
            <h1>talk room</h1>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ action('TalkroomController@index') }}" method="get">
                    <div class="cond_title form-group row">
                        <label class="information">タイトルを入れてください</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="cond_title row">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <a href="{{ action('Admin\TalkController@add') }}" class="btn btn-primary">
                    投稿を作成
                </a>
            </div>
        </div>
        <div class="row">
            <div class="posts col-md-12 mx-auto">
                @foreach ($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-12">
                            <div class="date">
                                {{ $post->updated_at->format('Y年m月d日') }}
                            </div>
                            <div class="title">
                                {{ str_limit($post->title, 100) }}
                            </div>
                            <div class="name">
                                {{ str_limit($post->name, 10) }}
                            </div>
                            <div class="body">
                                {{ str_limit($post->body, 300) }}
                            </div>
                            <a class="card-link" href="{{ action('TalkroomController@show', ['id' => $post->id]) }}">
                                <i class="far fa-comments">{{ $post->comments->count() }}件</i>
                            </a>
                            </div>
                        </div>
                    </div>
              @endforeach
            </div>
        </div>
    </div>
@endsection