<?php

namespace App\Models;

use App\Contracts\Datatable as DatatableContract;
use App\Traits\HasDatatable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Base extends Model implements Auditable, DatatableContract
{
    use \OwenIt\Auditing\Auditable;
    use HasDatatable;

    protected $guarded = [
        'id',
    ];
}
