<?php

namespace App\Transformers\Datatable;

use App\Models\Audit;
use League\Fractal\TransformerAbstract;

class AuditTransformer extends TransformerAbstract
{
    /**
     * @param \App\Models\Audit $model
     *
     * @return array
     */
    public function transform(Audit $model)
    {
        return [
            'id'   => (int) $model->id,
        ];
    }
}
