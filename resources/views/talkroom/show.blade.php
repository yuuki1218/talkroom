@extends('layouts.front')

@section('title', '詳細画面')
@section('content')
    <div class="container">
        <div class="posts col-md-12">
            <div class="post">
                <div class="col-md-12 row">
                    <div class="date">
                        {{ $post->updated_at->format('Y年m月d日') }}
                    </div>
                    <div class="col-md-12 row">
                        <div class="title">
                            {{ str_limit($post->title, 100) }}
                        </div>    
                    </div>
                    <div class="col-md-12 row">
                        <div class="name">
                            {{ str_limit($post->name, 10) }}
                        </div>
                    </div>
                    <div class="col-md-12 row">
                         <div class="body">
                             {{ str_limit($post->body, 300) }}
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 row">
                <div class="comment-post">
                    <form method="post" action="{{ action('CommentsController@store', $post->id) }}">
                        {{ csrf_field() }}
                        <p>
                            <input type="text" name="name" placeholder="名前" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                            @endif
                        </p>
                        <p>
                            <textarea name="body" placeholder="コメント" rows="4" cols="60">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                            <span class="error">{{ $errors->first('body') }}</span>
                            @endif
                        </p>
                        <p>
                            <input type="submit" value="コメントする">
                        </p>
                    </form>
                </div>
            </div>
        <div class="col-md-10 row">
            <div class="comment">
                <h2>コメント欄</h2>
                        @forelse ($post->comments as $comment)
                         <div class="comment-list">
                            <div class="row">
                                <div class="comment-name">
                                    {{ $comment->name }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="comment-body">
                                    {{ $comment->body }}
                                </div>
                            </div>
                          </div>
                        @empty
                            <p>まだコメントはありません</p>
                        @endforelse
            </div>
        </div>            
    </div>
@endsection