<?php

namespace Database\Seeders;

use App\Models\Merchant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        DB::beginTransaction();
        try {

            // Create specific merchants
            Merchant::create([
                'user_id' => 1,
                'owner_nama_lengkap' => $faker->name,
                'owner_no_hp' => $faker->phoneNumber,
                'owner_alamat_lengkap' => $faker->address,
                'owner_no_ktp' => $faker->unique()->numerify('################'),
                'owner_ktp' => 'ktp1.jpg',
                'merchant_nama' => 'G&R Masohi Shop',
                'merchant_jenis' => 'Retail',
                'slug' => 'G&R-Masohi-Shop',
                'merchant_alamat' => $faker->address,
                'merchant_omzet' => $faker->numberBetween(100000, 10000000),
                'merchant_foto' => 'logo1.jpg',
                'merchant_usaha' => 'usaha1.jpg',
                'merchant_banner' => 'banner1.png',
            ]);

            Merchant::create([
                'user_id' => 2,
                'owner_nama_lengkap' => $faker->name,
                'owner_no_hp' => $faker->phoneNumber,
                'owner_alamat_lengkap' => $faker->address,
                'owner_no_ktp' => $faker->unique()->numerify('################'),
                'owner_ktp' => 'ktp2.jpg',
                'merchant_nama' => 'VCO Desa Yainuelo',
                'merchant_jenis' => 'Wholesale',
                'slug' => 'VCO-Desa-Yainuelo',
                'merchant_alamat' => $faker->address,
                'merchant_omzet' => $faker->numberBetween(100000, 10000000),
                'merchant_foto' => 'logo2.jpg',
                'merchant_usaha' => 'usaha2.jpg',
                'merchant_banner' => 'banner2.png',
            ]);


            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}