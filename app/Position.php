<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    public function users() {
        return $this->hasMany(User::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
