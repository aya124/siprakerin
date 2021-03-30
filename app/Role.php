<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $fillable = [
        'name','display_name',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    public function permission()
    {
        return $this->hasMany(Permission::class, 'role_id', 'id');
    }
}
