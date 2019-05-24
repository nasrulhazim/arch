<?php

namespace App\Models;

use App\Contracts\Datatable as DatatableContract;
use App\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Builder;

class Audit extends \OwenIt\Auditing\Models\Audit implements DatatableContract
{
    use HasDatatable;

    /**
     * Datatable scope.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDatatable(Builder $query): Builder
    {
        return $query
            ->select($this->getDatatableFields())
            ->with('user', 'auditable')
            ->latest();
    }
}
