<?php

namespace App\Http\Datatables;

class UserDatatable extends Datatable
{
    /**
     * \App\Models\User.
     *
     * @var string
     */
    protected $model = \App\Models\User::class;

    /**
     * \App\Transformers\Datatable\UserTransformer.
     *
     * @var string
     */
    protected $transformer = \App\Transformers\Datatable\UserTransformer::class;
}
