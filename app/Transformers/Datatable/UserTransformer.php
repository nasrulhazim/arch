<?php

namespace App\Transformers\Datatable;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'name'   => $user->name,
            'email'  => $user->email,
            'action' => view('users.partials.actions', [
                'permission' => 'user',
                'view_url'   => route('users.show', $user->uuid),
                'edit_url'   => route('users.edit', $user->uuid),
                'delete_url' => route('api.user.destroy', $user->uuid),
                'id'         => $user->uuid,
                'user'       => $user,
            ])->__toString(),
        ];
    }
}
