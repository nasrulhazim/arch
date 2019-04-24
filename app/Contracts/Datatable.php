<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface Datatable
{
    public function getDatatableFields(): array;

    public function scopeDatatable(Builder $query): Builder;
}
