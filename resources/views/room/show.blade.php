@extends('layouts.front')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                            <div class="col-md-10">
                               <div class="title">
                                {{ str_limit($talk_form->title, 50) }}
                               </div>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                            <div class="col-md-10">
                               <div class="name">
                                  {{ str_limit($talk_form->name, 20) }}
                               </div>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                            <div class="col-md-10">
                                  <div class="body">
                                  {{ str_limit($talk_form->body, 100) }}
                               </div>
                            </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $talk_form->id }}">
                            {{ csrf_field() }}
                        </div>
                    </div>
            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>
            </section>
        </div>
    </div>
@endsection