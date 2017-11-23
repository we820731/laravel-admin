<?php

namespace App\Models;

use App\Models\User\Address;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Encore\Admin\Traits\AdminBuilder;

class User extends Authenticatable
{
    use AdminBuilder;

    protected $table = 'shop_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function searchableAs()
    {
        return 'users';
    }
}
