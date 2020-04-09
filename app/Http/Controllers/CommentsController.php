<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Talk;

class CommentsController extends Controller
{
    public function post(Request $request)
    {
        $this->validate($request, Comment::$rules);
        $comment = new Comment;
        $form = $request->all();
     
        unset($form['_token']);
     
        $comment->fill($form)->save();
        return redirect('/');
    }
    
    public function comment()
    {
        return view('room.comment');
    }
}
