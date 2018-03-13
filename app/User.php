<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $guarded = [];
    protected $appends = ['full_name', 'is_admin', 'is_co_admin', 'is_default', 'is_hr_head'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
      'status' => 'boolean',
    ];

    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function getFullNameAttribute() {
        $fullName = $this->first_name . ' ' . $this->last_name;
        return $this->attributes['full_name'] = $fullName;
    }

    public function getIsAdminAttribute() {
        $bool = $this->access_type == 'admin' ? true : false;
        return $this->attributes['is_admin'] = $bool;
    }

    public function getIsCoAdminAttribute() {
        $bool = $this->access_type == 'co-admin' ? true : false;
        return $this->attributes['is_co_admin'] = $bool;
    }

    public function getIsDefaultAttribute() {
        $bool = $this->access_type == 'default' ? true : false;
        return $this->attributes['is_default'] = $bool;
    }

    public function getIsHrHeadAttribute() {
        $bool = $this->position_id == 47 && $this->branch_id == 5 ? true : false;
        return $this->attributes['is_hr_head'] = $bool;
    }
}
