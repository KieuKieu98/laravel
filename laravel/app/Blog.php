<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'content', 'image','user_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class,'user_id');
    }
}
