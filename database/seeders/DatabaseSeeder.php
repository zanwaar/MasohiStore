<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $this->call([
            // CreateTokohsSeeder::class
            PermissionsDemoSeeder::class,
            MerchantSeeder::class,
            ProductSeeder::class
        ]);

        sleep(2);
        \App\Models\Rating::factory(200)->create();
    }
}
