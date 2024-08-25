<?php

namespace Database\Seeders;

use App\Models\Merchant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

            Merchant::create(
                [
                    'user_id' => 1,
                    // 'owner_nama_lengkap' => $faker->name,
                    'owner_no_hp' => $faker->phoneNumber,
                    // 'owner_alamat_lengkap' => $faker->address,
                    // 'owner_no_ktp' => $faker->phoneNumber,
                    // 'owner_ktp_file_url' => 'ktp1.jpg',
                    'merchant_nama' => 'G&R Masohi Shop',
                    'slug' => 'G&R-Masohi-Shop',
                    'merchant_alamat' => $faker->address,
                    // 'merchant_lokasi' => '-3.299317552465129 , 128.96019193664188',
                    'merchant_foto' => 'logo1.jpg',
                    'merchant_banner' => 'banner1.png',
                ]
            );
            Merchant::create(
                [
                    'user_id' => 2,
                    // 'owner_nama_lengkap' => $faker->name,
                    'owner_no_hp' => $faker->phoneNumber,
                    // 'owner_alamat_lengkap' => $faker->address,
                    // 'owner_no_ktp' => $faker->phoneNumber,
                    // 'owner_ktp_file_url' => 'ktp1.jpg',
                    'merchant_nama' => 'VCO Desa Yainuelo',
                    'slug' => 'VCO-Desa-Yainuelo',
                    'merchant_alamat' => $faker->address,
                    // 'merchant_lokasi' => '-3.299317552465129 , 128.96019193664188',
                    'merchant_foto' => 'logo2.jpg',
                    'merchant_banner' => 'banner2.png',
                ]
            );

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
