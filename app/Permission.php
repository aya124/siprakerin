<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    protected $fillable = [
        'name','display_name',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
