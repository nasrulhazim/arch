<?php

namespace App\Transformers\Datatable;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * @param \App\Models\User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'name'   => $user->name,
            'email'  => $user->email,
            'action' => view('components.datatable.actions', [
                'permission'        => 'user',
                'view_url'          => route('users.show', $user->id),
                'edit_url'          => route('users.edit', $user->id),
                'delete_route_name' => 'api.user.destroy',
                'id'                => $user->id,
            ])->__toString(),
        ];
    }
}
