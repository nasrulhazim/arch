<?php

namespace App\Models;

use App\Contracts\Datatable as DatatableContract;
use App\Traits\HasDatatable as DatatableTrait;
use CleaniqueCoders\LaravelUuid\Contracts\HasUuid as HasUuidContract;
use CleaniqueCoders\LaravelUuid\Traits\HasUuid;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Media extends \Spatie\MediaLibrary\Models\Media implements DatatableContract, AuditableContract, HasUuidContract
{
    use HasUuid;
    use AuditableTrait;
    use DatatableTrait;
}
