@extends('layouts.front')

@section('content')
   <form class="mb-4" method="post" action="{{ action('CommentsController@post') }}">
       {{ csrf_field() }}
       
      
       
       <div class="form-group col-md-6 mx-auto">
           <label for="name">名前</label>
               <div class="col-md-6 mx-auto">
                   <input type="text" class="form-control" name="name" value="{{ old('name') }}">
               </div>
       </div>
       <div class="form-group col-md-6 mx-auto">
           <label for="body">本文</label>
               <div class="col-md-6 mx-auto">
                   <textarea id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                       rows="10">{{ old('body') }}</textarea>
               </div>
                   @if ($errors->has('body'))
                       <div class="invalid-feedback">
                           {{ $errors->first('body') }}
                       </div>
                   @endif
       </div>
       <div class="col-md-6 mx-auto">
           <button type="submit" class="btn btn-primary">
               コメントする
           </button>
       </div>
   </form> 
@endsection