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
            $posts = Talk::all();
        }
        return view('room.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function show(Request $request)
    {
        $talk = Talk::find($request->id);
        if (empty($talk)) {
            abort(404);
        }
        return view('room.show', ['talk_form' => $talk]);
    }
}
