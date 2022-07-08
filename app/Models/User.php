<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function real_state()
    {
        return $this->hasManny(RealState::class);
    }
}
