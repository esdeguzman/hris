<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    public function users() {
        return $this->hasMany(User::class);
    }

    public function positions() {
        return $this->hasMany(Position::class);
    }
}
