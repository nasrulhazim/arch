<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasDatatable
{
    /**
     * Get Datatable Fields to be display.
     *
     * @return array
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
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDatatable(Builder $query): Builder
    {
        return $query->select($this->getDatatableFields());
    }
}
