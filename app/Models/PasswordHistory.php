<?php

namespace App\Models;

use CleaniqueCoders\LaravelUuid\Contracts\HasUuid as HasUuidContract;
use CleaniqueCoders\LaravelUuid\Traits\HasUuid;
use Illuminate\Support\Facades\Hash;

class PasswordHistory extends Base implements HasUuidContract
{
    use HasUuid;

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
