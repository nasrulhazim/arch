<?php

namespace App\Models\Profile;

use CleaniqueCoders\LaravelUuid\Contracts\HasUuid as HasUuidContract;
use CleaniqueCoders\LaravelUuid\Traits\HasUuid;
use CleaniqueCoders\Profile\Models\Website as Base;

class Website extends Base implements HasUuidContract
{
	use HasUuid;
}
