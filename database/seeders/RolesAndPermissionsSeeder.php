<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{

    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'publish users']);
        Permission::create(['name' => 'unpublish users']);

        // or may be done by chaining


        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('super12345678admin'),
        ]);
        $user->assignRole($role);

        $user1 = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'test@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $role2 = Role::create(['name' => 'user'])
            ->givePermissionTo(['edit users']);

        $user1->assignRole($role2);
    }
}
