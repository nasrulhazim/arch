<?php

namespace App\Models;

use App\Contracts\Datatable as DatatableContract;
use App\Traits\HasDatatable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail  as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;
use Yadahan\AuthenticationLog\AuthenticationLogable;

class User extends Authenticatable implements Auditable, MustVerifyEmailContract, DatatableContract
{
    use HasDatatable;
    use HasApiTokens;
    use HasRoles;
    use
    Notifiable;
    use \OwenIt\Auditing\Auditable;
    use
    Impersonate;
    use AuthenticationLogable;
    use MustVerifyEmailTrait;

    /**
     * The attributes that show in datatable.
     *
     * @var array
     */
    protected $datatable = [
        'id', 'name', 'email',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'employee_id', 'email', 'lan_id', 'dept_id', 'level_id', 'designation', 'password', 'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at'          => 'datetime',
        'password_expired_at'        => 'datetime',
        'account_expired_at'         => 'datetime',
        'is_first_time_login'        => 'boolean',
        'is_password_reset_by_admin' => 'boolean',
    ];

    /**
     * Datatable scope.
     */
    public function scopeDatatable(Builder $query): Builder
    {
        return $query->select('users.*');
    }

    /**
     * Determine either user is first time log into the application.
     */
    public function firstTimeLogin(): bool
    {
        return 0 === $this->authentications()->count() ? true : false;
    }

    /**
     * Determined either current user has unread notifications.
     */
    public function hasUnreadNotifications(): bool
    {
        return $this->totalUnreadNotifications() > 0;
    }

    /**
     * Get total unread notifications.
     */
    public function totalUnreadNotifications(): int
    {
        return $this->unreadNotifications->count();
    }
}
