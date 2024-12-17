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
        $title = $faker->words(3, true); // Generate a three-word phrase
        $slug = strtolower(str_replace(' ', '-', $title));


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
                'merchant_foto' => 'ggr.jpg',
                'merchant_usaha' => 'usaha1.jpg',
                'merchant_banner' => 'banner-ggr.jpg',
            ]);

            Merchant::create([
                'user_id' => 2,
                'owner_nama_lengkap' => $faker->name,
                'owner_no_hp' => $faker->phoneNumber,
                'owner_alamat_lengkap' => $faker->address,
                'owner_no_ktp' => $faker->unique()->numerify('################'),
                'owner_ktp' => 'ktp2.jpg',
                'merchant_nama' => 'VCO Desa Yainuelo',
                'merchant_jenis' => 'Kuliner',
                'slug' => 'VCO-Desa-Yainuelo',
                'merchant_alamat' => $faker->address,
                'merchant_omzet' => $faker->numberBetween(100000, 10000000),
                'merchant_foto' => 'vco.jpg',
                'merchant_usaha' => 'usaha2.jpg',
                'merchant_banner' => 'banner-vco.jpg',
            ]);


            Merchant::create([
                'user_id' => 3,
                'owner_nama_lengkap' => $faker->name,
                'owner_no_hp' => $faker->phoneNumber,
                'owner_alamat_lengkap' => $faker->address,
                'owner_no_ktp' => $faker->unique()->numerify('################'),
                'owner_ktp' => 'ktp2.jpg',
                'merchant_nama' => 'Gagartang',
                'merchant_jenis' => 'Kuliner',
                'slug' => 'gagartang',
                'merchant_alamat' => $faker->address,
                'merchant_omzet' => $faker->numberBetween(100000, 10000000),
                'merchant_foto' => 'gargantang.jpg',
                'merchant_usaha' => 'gargantang.jpg',
                'merchant_banner' => 'banner-gargantang.jpg',
            ]);


            Merchant::create([
                'user_id' => 4,
                'owner_nama_lengkap' => $faker->name,
                'owner_no_hp' => $faker->phoneNumber,
                'owner_alamat_lengkap' => $faker->address,
                'owner_no_ktp' => $faker->unique()->numerify('################'),
                'owner_ktp' => 'ktp2.jpg',
                'merchant_nama' => 'Coklat sobeak',
                'merchant_jenis' => 'Kuliner',
                'slug' => $slug,
                'merchant_alamat' => $faker->address,
                'merchant_omzet' => $faker->numberBetween(100000, 10000000),
                'merchant_foto' => 'gargantang.jpg',
                'merchant_usaha' => 'gargantang.jpg',
                'merchant_banner' => 'banner-gargantang.jpg',
            ]);

            Merchant::create([
                'user_id' => 5,
                'owner_nama_lengkap' => $faker->name,
                'owner_no_hp' => $faker->phoneNumber,
                'owner_alamat_lengkap' => $faker->address,
                'owner_no_ktp' => $faker->unique()->numerify('################'),
                'owner_ktp' => 'ktp2.jpg',
                'merchant_nama' => 'Goda’an',
                'merchant_jenis' => 'Kuliner',
                'slug' =>    $slug,
                'merchant_alamat' => $faker->address,
                'merchant_omzet' => $faker->numberBetween(100000, 10000000),
                'merchant_foto' => 'gargantang.jpg',
                'merchant_usaha' => 'gargantang.jpg',
                'merchant_banner' => 'banner-gargantang.jpg',
            ]);

            Merchant::create([
                'user_id' => 6,
                'owner_nama_lengkap' => $faker->name,
                'owner_no_hp' => $faker->phoneNumber,
                'owner_alamat_lengkap' => $faker->address,
                'owner_no_ktp' => $faker->unique()->numerify('################'),
                'owner_ktp' => 'ktp2.jpg',
                'merchant_nama' => 'Geprek bung azka',
                'merchant_jenis' => 'Kuliner',
                'slug' =>    $slug,
                'merchant_alamat' => $faker->address,
                'merchant_omzet' => $faker->numberBetween(100000, 10000000),
                'merchant_foto' => 'gargantang.jpg',
                'merchant_usaha' => 'gargantang.jpg',
                'merchant_banner' => 'banner-gargantang.jpg',
            ]);

            Merchant::create([
                'user_id' => 7,
                'owner_nama_lengkap' => $faker->name,
                'owner_no_hp' => $faker->phoneNumber,
                'owner_alamat_lengkap' => $faker->address,
                'owner_no_ktp' => $faker->unique()->numerify('################'),
                'owner_ktp' => 'ktp2.jpg',
                'merchant_nama' => 'SeeCoffe.id',
                'merchant_jenis' => 'Kuliner',
                'slug' =>    $slug,
                'merchant_alamat' => $faker->address,
                'merchant_omzet' => $faker->numberBetween(100000, 10000000),
                'merchant_foto' => 'gargantang.jpg',
                'merchant_usaha' => 'gargantang.jpg',
                'merchant_banner' => 'banner-gargantang.jpg',
            ]);


            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
