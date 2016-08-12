<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['title', 'text', 'created_at', 'updated_at'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
