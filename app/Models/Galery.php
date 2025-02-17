<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table = 'galeries';
    protected $guarded = [];

    public function comments(){
        return $this->hasMany(Comment::class,'galeries_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
