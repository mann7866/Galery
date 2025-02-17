<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $guarded = [];

    public function galery()
    {
        return $this->belongsTo(Galery::class, 'galeries_id');
    }

    // Relasi ke komentar balasan
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }   

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
