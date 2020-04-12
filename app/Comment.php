<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Talk;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'body',
        ];
        
    public static $rules = array(
            'name' => 'required',
            'body' => 'required',
        );
        
    public function talks()
    {
        return $this->belongsTo('App\Talk');
    }
}
