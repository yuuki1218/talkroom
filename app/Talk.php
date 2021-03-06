<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Talk extends Model
{
    protected $fillable = [
        'title',
        'name',
        'body',
    ];
    
    public static $rules = array(
        'title' => 'required',
        'body'  => 'required',
    );
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
