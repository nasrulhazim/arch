<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SelectOptionTrait
{
    /**
     * Datatable scope.
     */
    public function scopeSelectOptions(Builder $query)
    {
        return $this->get($this->getSelectOptionFields());
    }

    public function getSelectOptionFields(): array
    {
        return isset($this->select_option_fields)
            ? $this->select_option_fields
            : ['id'];
    }
}
