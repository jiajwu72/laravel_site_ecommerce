<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pannier extends Model
{
    public function posts()
    {
        return hasMany(Post::class);
    }
}
