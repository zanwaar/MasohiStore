<?php

namespace Database\Seeders;

use App\Models\Ketegori;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        DB::beginTransaction();
        try {
            DB::table('ketegoris')->insert([
                [
                    'name' => 'Makanan Tradisional Maluku',
                    'slug' => 'makanan-tradisional-maluku',
                    'image' => 'makanan_tradisional.jpg',
                    'is_active' => true,
                ], //1
                [
                    'name' => 'Produk Olahan Ikan dan Laut',
                    'slug' => 'produk-olahan-ikan-dan-laut',
                    'image' => 'produk_olahan_ikan.jpg',
                    'is_active' => true,
                ], //2
                [
                    'name' => 'Minuman Khas dan Herbal',
                    'slug' => 'minuman-khas-dan-herbal',
                    'image' => 'minuman_khas.jpg',
                    'is_active' => true,
                ], //3
                [
                    'name' => 'Kue dan Jajanan Lokal',
                    'slug' => 'kue-dan-jajanan-lokal',
                    'image' => 'kue_jajanan.jpg',
                    'is_active' => true,
                ], //4
                [
                    'name' => 'Kerajinan Tangan dan Souvenir Lokal',
                    'slug' => 'kerajinan-tangan-dan-souvenir-lokal',
                    'image' => 'kerajinan_tangan.jpg',
                    'is_active' => true,
                ], //5
                [
                    'name' => 'Bumbu dan Rempah-rempah Lokal',
                    'slug' => 'bumbu-dan-rempah-rempah-lokal',
                    'image' => 'bumbu_rempah.jpg',
                    'is_active' => true,
                ], //6
                [
                    'name' => 'Makanan Siap Saji',
                    'slug' => 'makanan-siap-saji',
                    'image' => 'makanan_siap_saji.jpg',
                    'is_active' => true,
                ], //7
                [
                    'name' => 'Pakaian dan Fashion Lokal',
                    'slug' => 'pakaian-dan-fashion-lokal',
                    'image' => 'pakaian_fashion.jpg',
                    'is_active' => true,
                ], //8
                [
                    'name' => 'Aksesoris dan Perhiasan',
                    'slug' => 'aksesoris-dan-perhiasan',
                    'image' => 'aksesoris_perhiasan.jpg',
                    'is_active' => true,
                ], //9
                [
                    'name' => 'Pakaian Anak dan Bayi',
                    'slug' => 'pakaian-anak-dan-bayi',
                    'image' => 'pakaian_anak.jpg',
                    'is_active' => true,
                ], //10
                [
                    'name' => 'Pakaian Kasual dan Harian',
                    'slug' => 'pakaian-kasual-dan-harian',
                    'image' => 'pakaian_kasual.jpg',
                    'is_active' => true,
                ], //11
                [
                    'name' => 'Produk Kesehatan dan Herbal',
                    'slug' => 'Produk-Kesehatan-dan-Herbal',
                    'image' => 'pakaian_kasual.jpg',
                    'is_active' => true,
                ], //12
            ]);

            Product::create(
                [
                    'merchant_id' => 1,
                    'name' => 'Abon Ikan Tuna (Rasa Pedas)',
                    'slug' => 'Abon-Ikan-Tuna-Rasa-Pedas',
                    'images' => 'ggr2.jpg',
                    'description' => $faker->text(500),
                    'price' => 100000,
                    'is_active' => true,
                    'in_stock' => true,
                    'category_id' => 2,
                ]
            );
        
            Product::create(
                [
                    'merchant_id' => 1,
                    'name' => 'Sambal Sedap',
                    'slug' => 'Sambal-Sedap',
                    'images' => 'top.jpg',
                    'description' => $faker->text(500),
                    'price' => 100000,
                    'is_active' => true,
                    'in_stock' => true,
                    'category_id' => 2,
                ]
            );

            Product::create(
                [
                    'merchant_id' => 2,
                    'name' => 'VCO Neto:200 ml',
                    'slug' => 'VCO-Neto-200-ml',
                    'images' => 'vco1.png',
                    'description' => $faker->text(500),
                    'price' => 100000,
                    'is_active' => true,
                    'in_stock' => true,
                    'category_id' => 12,
                ]
            );

            Product::create(
                [
                    'merchant_id' => 1,
                    'name' => 'Abon Ikan Tuna (Original)',
                    'slug' => 'Abon-Ikan-Tuna-(Original)',
                    'images' => 'ggr1.jpg',
                    'description' => $faker->text(500),
                    'price' => 100000,
                    'is_active' => true,
                    'in_stock' => true,
                    'category_id' => 2,
                ]
            );
            Product::create(
                [
                    'merchant_id' => 1,
                    'name' => 'Sambal Ikan',
                    'slug' => 'Sambal-Ikan',
                    'images' => 'sam.jpg',
                    'description' => $faker->text(500),
                    'price' => 100000,
                    'is_active' => true,
                    'in_stock' => true,
                    'category_id' => 2,
                ]
            );

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
