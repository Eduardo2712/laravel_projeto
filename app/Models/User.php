<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        "name",
        "email",
        "password",
    ];

    public function real_state()
    {
        return $this->hasManny(RealState::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
}
