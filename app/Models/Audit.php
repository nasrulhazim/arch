<?php

namespace App\Models;

use App\Contracts\Datatable as DatatableContract;
use App\Traits\HasDatatable;
use CleaniqueCoders\LaravelUuid\Contracts\HasUuid as HasUuidContract;
use CleaniqueCoders\LaravelUuid\Traits\HasUuid;
use Illuminate\Database\Eloquent\Builder;

class Audit extends \OwenIt\Auditing\Models\Audit implements DatatableContract, HasUuidContract
{
    use HasUuid;
    use HasDatatable;

    /**
     * Datatable scope.
     */
    public function scopeDatatable(Builder $query): Builder
    {
        return $query
            ->select($this->getDatatableFields())
            ->with('user', 'auditable')
            ->latest();
    }
}
