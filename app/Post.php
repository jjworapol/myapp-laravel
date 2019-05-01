<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $fillable =['title','detail'];

    public function comments(){
        return $this->hasMany('\App\Comment');
    }


    public function user(){ //view who create post
        return $this->belongsTo('\App\User');
    }
}
