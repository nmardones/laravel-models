<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }
}
