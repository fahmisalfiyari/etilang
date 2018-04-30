<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }
}
