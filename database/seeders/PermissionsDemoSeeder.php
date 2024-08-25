<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'edit articles']);
        // Permission::create(['name' => 'delete articles']);
        // Permission::create(['name' => 'publish articles']);
        // Permission::create(['name' => 'unpublish articles']);

        // create roles and assign existing permissions

        $role = Role::create(['name' => 'user']);
        $role1 = Role::create(['name' => 'merchant']);
        // $role1->givePermissionTo('edit articles');
        // $role1->givePermissionTo('delete articles');

        $role2 = Role::create(['name' => 'admin']);
        // $role2->givePermissionTo('publish articles');
        // $role2->givePermissionTo('unpublish articles');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'januar samjid',
            'email' => 'januarsamjid@gmail.com',
        ]);
        $user->assignRole($role);
        $user = \App\Models\User::factory()->create([
            'name' => 'Merchant 1',
            'email' => 'merchant1@example.com',
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'Merchant 2',
            'email' => 'merchant2@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);

        for ($i = 0; $i < 100; $i++) {
            $user = \App\Models\User::factory()->create();
            $user->assignRole($role);
        }
        // \App\Models\User::factory(100)->create()->assignRole($role);
    }
}
