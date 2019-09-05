<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;

class PasswordHistory extends Base
{
    public function scopeUser($query, $value)
    {
        return $query->where('user_id', $value);
    }

    public function scopeOldPassword($query, $value)
    {
        return $query->where('password', Hash::make($value));
    }

    public function scopeIsOldPassword($query, $user_id, $new_password)
    {
        return $query->user($user_id)->oldPassword($new_password);
    }
}
