<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CustomRole;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $role = Role::create(['name' => 'Admin']);
        // $role = CustomRole::create(['name' => 'Admin']);



        // $permissions = Permission::pluck('id','id')->all();

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);
    }
}
