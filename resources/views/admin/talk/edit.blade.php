@extends('layouts.talk')
@section('title','編集画面')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>編集画面</h2>
                <form action="{{ action('Admin\TalkController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title" value="{{ $talk_form->title }}">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="{{ $talk_form->name }}">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="body" rows="10">{{ $talk_form->body }}</textarea>
                            </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $talk_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection