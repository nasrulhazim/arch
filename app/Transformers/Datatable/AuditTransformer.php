<?php

namespace App\Transformers\Datatable;

use App\Models\Audit;
use League\Fractal\TransformerAbstract;

class AuditTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(Audit $model)
    {
        return [
            'type'     => class_basename($model->auditable),
            'user'     => $model->user->name,
            'datetime' => $model->created_at->format('H:i:s, d-m-Y'),
            'action'   => view('audit.partials.actions', [
                'view_url'   => route('audit.show', $model->id),
                'permission' => 'audit',
            ])->__toString(),
        ];
    }
}
