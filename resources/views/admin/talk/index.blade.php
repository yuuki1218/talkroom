@extends('layouts.talk')
@section('title', '投稿一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>投稿一覧</h2>
        </div> 
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\TalkController@add') }}" role="button" class="btn btn-primary">投稿画面</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\TalkController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-talk col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="10%">名前</th>
                                <th width="40%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ \Str::limit($post->title, 50) }}</td>
                                    <td>{{ \Str::limit($post->name, 20) }}</td>
                                    <td>{{ \Str::limit($post->body, 100) }}</td>
                                    <td>
                                        <a href="{{ action('Admin\TalkController@edit',['id' => $post->id]) }}">編集</a>
                                    </td>
                                    <td>
                                        <a href="{{ action('Admin\TalkController@delete', ['id' => $post->id]) }}">削除</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
    
    
    
    
    
    
    