<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        
    public function show()
    {
        return $this->belongsTo('App\Talk');
    }
}
