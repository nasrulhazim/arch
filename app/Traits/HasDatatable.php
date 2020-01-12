<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasDatatable
{
    /**
     * Get Datatable Fields to be display.
     */
    public function getDatatableFields(): array
    {
        if (! isset($this->datatable)) {
            return ['*'];
        }

        return $this->datatable;
    }

    /**
     * Datatable scope.
     */
    public function scopeDatatable(Builder $query): Builder
    {
        return $query->select($this->getDatatableFields());
    }
}
