<?php

namespace App\Http\Datatables;

class AuditDatatable extends Datatable
{
    /**
     * \App\Models\Audit.
     *
     * @var string
     */
    protected $model = '\App\Models\Audit';

    /**
     * \App\Transformers\Datatable\AuditTransformer.
     *
     * @var string
     */
    protected $transformer = '\App\Transformers\Datatable\AuditTransformer';
}

