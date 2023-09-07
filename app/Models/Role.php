<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Contracts\Role as RoleContract;
use Spatie\Permission\Exceptions\GuardDoesNotMatch;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Guard;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\RefreshesPermissionCache;

class CustomRole extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $connection = 'mongodb';
	protected $collection = 'roles';
}

