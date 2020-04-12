<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Talk;

class CommentsController extends Controller
{
    public function store(Request $request, $talkId)
    {
        $this->validate($request, Comment::$rules);
        $comment = new Comment(['name' => $request->name,
                                'body' => $request->body]);
     
        $post = Talk::findOrFail($talkId);
        $post->comments()->save($comment);
        return view('talkroom.show')->with('post', $post);
    }
}
