<?php

namespace App\Models\Profile;

use CleaniqueCoders\LaravelUuid\Contracts\HasUuid as HasUuidContract;
use CleaniqueCoders\LaravelUuid\Traits\HasUuid;
use CleaniqueCoders\Profile\Models\Address as Base;

class Address extends Base implements HasUuidContract
{
	use HasUuid;
}
