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
            'name' => 'Merchant 3',
            'email' => 'merchant3@example.com',
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'Merchant 4',
            'email' => 'merchant4@example.com',
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'Merchant 5',
            'email' => 'merchant5@example.com',
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'Merchant 6',
            'email' => 'merchant6@example.com',
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'Merchant 7',
            'email' => 'merchant7@example.com',
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'Merchant 8',
            'email' => 'merchant8@example.com',
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'Merchant 9',
            'email' => 'merchant9@example.com',
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'Merchant 10',
            'email' => 'merchant10@example.com',
        ]);
        $user->assignRole($role1);




        $user = \App\Models\User::factory()->create([
            'name' => 'januar samjid',
            'email' => 'januarsamjid@gmail.com',
        ]);
        $user->assignRole($role);
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Super-Admin User',
        //     'email' => 'superadmin@example.com',
        // ]);
        // $user->assignRole($role3);


        // $faker = \Faker\Factory::create();
        // for ($i = 0; $i < 5; $i++) {
        //     // Create a user
        //     $user = \App\Models\User::factory()->create(); // Create user dynamically
        //     $user->assignRole($role1); // Assign role to the user

        //     // Generate merchant slug
        //     $title = $faker->words(3, true);
        //     $slug = strtolower(str_replace(' ', '-', $title));

        //     // Create merchant associated with the user
        //     \App\Models\Merchant::create([
        //         'user_id' => $user->id, // Use the newly created user's ID
        //         'owner_nama_lengkap' => $faker->name,
        //         'owner_no_hp' => $faker->phoneNumber,
        //         'owner_alamat_lengkap' => $faker->address,
        //         'owner_no_ktp' => $faker->unique()->numerify('################'),
        //         'owner_ktp' => 'ktp2.jpg',
        //         'merchant_nama' => $faker->company, // Use company name for merchant name
        //         'merchant_jenis' => 'Kuliner',
        //         'slug' => $slug,
        //         'merchant_alamat' => $faker->address,
        //         'merchant_omzet' => $faker->numberBetween(100000, 10000000),
        //         'merchant_foto' => 'default.jpg',
        //         'merchant_usaha' => 'default.jpg',
        //         'merchant_banner' => 'banner-default.jpg',
        //     ]);
        // }
        // \App\Models\User::factory(100)->create()->assignRole($role);
    }
}
