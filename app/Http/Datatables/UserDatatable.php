<?php

namespace App\Http\Datatables;

class UserDatatable extends Datatable
{
    /**
     * Searchable fields.
     *
     * @var array
     */
    protected $searchable = [
            'users.created_at',
            'users.department_id',
            'users.email',
            'users.email_verified_at',
            'users.id',
            'users.name',
            'users.password',
            'users.remember_token',
            'users.reviewer_id',
            'users.supervisor_id',
            'users.updated_at',
        ];

    /**
     * Orderable fields.
     *
     * @var array
     */
    protected $orderable = [
            'users.created_at',
            'users.email',
            'users.email_verified_at',
            'users.id',
            'users.name',
            'users.password',
            'users.remember_token',
            'users.updated_at',
        ];

    /**
     * Select Fields.
     */
    protected $select = [
            'users.created_at',
            'users.email',
            'users.email_verified_at',
            'users.id',
            'users.name',
            'users.password',
            'users.remember_token',
            'users.updated_at',
        ];

    /**
     * Map Fields.
     *
     * @param \Illuminate\Database\Eloquent\Model $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->name,
            $row->email,
            view('components.datatable.actions', [
                'permission'        => 'user',
                'view_url'          => route('users.show', $row->id),
                'edit_url'          => route('users.edit', $row->id),
                'delete_route_name' => 'api.user.destroy',
                'id'                => $row->id,
            ])->__toString(),
        ];
    }

    /**
     * Get FQCN of the model.
     *
     * @return string
     */
    public function getModel(): string
    {
        return \App\Models\User::class;
    }
}
