<?php

namespace App\Http\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
        $start       = $request->input('start');
        $length      = $request->input('length');
        $orderColumn = $request->input('order.0.column');
        $orderDir    = $request->input('order.0.dir');
        $search      = $request->input('search.value');
        $draw        = $request->input('draw');
        $query       = $this->query($request);

        if ($search) {
            $query->where(function ($query) use ($search) {
                $searchables = $this->searchable();
                foreach ($searchables as $index => $searchable) {
                    if (0 == $index) {
                        $query->where($searchable, 'like', "%$search%");
                    } else {
                        $query->orWhere($searchable, 'like', "%$search%");
                    }
                }
            });
        }

        $orderables = $this->orderable();
        if (isset($orderables[$orderColumn])) {
            $query->orderBy($orderables[$orderColumn], $orderDir);
        }

        $this->filter($request, $query);

        $recordsTotal    = $this->query($request)->count();
        $recordsFiltered = $query->count();
        $data            = $query
            ->take($length)
            ->skip($start)
            ->get()
            ->map(function ($row) {
                return $this->map($row);
            });

        return [
            'data'            => $data,
            'draw'            => $draw,
            'recordsTotal'    => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'error'           => '',
            'args'            => [
                'start'       => $start,
                'length'      => $length,
                'orderColumn' => $orderColumn,
                'orderDir'    => $orderDir,
                'search'      => $search,
            ],
        ];
    }

    abstract public function getModel(): string;

    public function filter(Request $request, Builder $builder): void
    {
    }

    protected function searchable(): array
    {
        return $this->searchable;
    }

    protected function orderable(): array
    {
        return $this->orderable;
    }

    protected function query(Request $request): Builder
    {
        return $this->getModel()::select($this->select)->with($this->loadable());
    }

    protected function loadable(): array
    {
        return $this->loadable ?? [];
    }
}
