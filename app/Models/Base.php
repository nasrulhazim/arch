<?php

namespace App\Models;

use App\Contracts\Datatable as DatatableContract;
use App\Traits\HasDatatable;
use App\Traits\HasMediaExtended;
use App\Traits\SelectOptionTrait;
use App\Traits\WithDetailsTrait;
use CleaniqueCoders\LaravelUuid\Contracts\HasUuid as HasUuidContract;
use CleaniqueCoders\LaravelUuid\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia\HasMedia as MediaContract;

class Base extends Model implements Auditable, DatatableContract, MediaContract, HasUuidContract
{
    use HasUuid;
    use \OwenIt\Auditing\Auditable;
    use HasDatatable;
    use SelectOptionTrait;
    use WithDetailsTrait;
    use HasMediaExtended;

    protected $guarded = [
        'id',
    ];
}
