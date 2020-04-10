<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Talk;
use App\Comment;

class TalkController extends Controller
{
    public function add()
    {
        return view('admin.talk.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Talk::$rules);
        $talk = new Talk;
        $form = $request->all();
        
        unset($form['_token']);
        
        $talk->fill($form)->save();
        
        return redirect('admin/talk/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Talk::where('title', 'like', '%'.$cond_title.'%')->get();
        } else {
            $posts = Talk::all();
        }
        return view('admin.talk.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        $talk = Talk::find($request->id);
        if (empty($talk)) {
            abort(404);
        }
        return view('admin.talk.edit', ['talk_form' => $talk]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Talk::$rules);
        $talk =Talk::find($request->id);
        $talk_form = $request->all();
        unset($talk_form['_token']);
        $talk->fill($talk_form)->save();
        
        return redirect('admin/talk/index');
    }
    
    public function delete(Request $request)
    {
        $talk = Talk::find($request->id);
        $talk->delete();
        
        return redirect('admin/talk/index');
    }
}
