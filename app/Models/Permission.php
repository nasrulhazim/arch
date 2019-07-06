<?php

namespace App\Models;

use OwenIt\Auditing\Contracts\Auditable;

class Permission extends \Spatie\Permission\Models\Permission implements Auditable
{
    use \OwenIt\Auditing\Auditable;
}
