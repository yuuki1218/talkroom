<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;
use App\Comment;

class TalkroomController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Talk::where('title', 'like', '%'.$cond_title.'%')->get();
        } else {
            $posts = Talk::latest('created_at')->get();
        }
        
        
        return view('talkroom.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function show($id)
    {
        $post = Talk::findOrFail($id);

        return view('talkroom.show')->with('post', $post);
    }
}
