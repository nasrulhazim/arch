<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait WithDetailsTrait
{
    public function scopeWithDetails(Builder $query): Builder
    {
        return isset($this->with_details)
            ? $query->with($this->with_details)
            : $query;
    }
}
