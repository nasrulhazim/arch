<?php

namespace App\Http\Datatables;

use App\Contracts\Datatable as DatatableContract;
use Illuminate\Http\Request;
use League\Fractal\TransformerAbstract as TransformerContract;

abstract class Datatable
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return app('datatables')
            ->eloquent($this->getModel($request)::datatable())
            ->setTransformer($this->getTransformer($request))
            ->toJson();
    }

    public function getModel(Request $request): DatatableContract
    {
        return new $this->model();
    }

    public function getTransformer(Request $request): TransformerContract
    {
        return new $this->transformer();
    }
}
