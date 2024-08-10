<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Ayam Goreng Serundeng',
            'price'=>60000,
            'sold'=>0, 
            'description'=>'Ayam Goreng dengan Serundeng',
            'image'=>'ayam-goreng-serundeng.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Ayam Saos Mentega',
            'price'=>80000,
            'sold'=>0, 
            'description'=>'Ayam Goreng dengan Saos Mentega',
            'image'=>'ayam-saos-mentega.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Bakso Ikan Asam Manis',
            'price'=>65000,
            'sold'=>0, 
            'description'=>'Bakso Ikan Kakap dengan Saos Asam Manis',
            'image'=>'bakso-ikan-asam-manis.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Buncis Telur Asin',
            'price'=>40000,
            'sold'=>0, 
            'description'=>'Buncis Tumis dengan Telur Asin',
            'image'=>'buncis-telur-asin.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Buncis Udang Kering',
            'price'=>50000,
            'sold'=>0, 
            'description'=>'Buncis Tumis dengan Udang Kering',
            'image'=>'buncis-udang-kering.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>3,
            'name'=>'Cupcake Keju',
            'price'=>75000,
            'sold'=>0, 
            'description'=>'Cupcake dengan Topping Keju',
            'image'=>'cupcake-keju.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>3,
            'name'=>'Donat Gula Halus',
            'price'=>80000,
            'sold'=>0, 
            'description'=>'Donat dengan Topping Gula Halus',
            'image'=>'donat-gula-halus.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Ikan Patin Pedas',
            'price'=>65000,
            'sold'=>0, 
            'description'=>'Ikan Patin Tumis dengan Saos Pedas',
            'image'=>'ikan-patin-pedas.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>4,
            'name'=>'Jus Jeruk',
            'price'=>25000,
            'sold'=>0, 
            'description'=>'Jus Buah Jeruk',
            'image'=>'jus-jeruk.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>4,
            'name'=>'Jus Jeruk Kiwi',
            'price'=>25000,
            'sold'=>0, 
            'description'=>'Jus Buah Jeruk dan Kiwi',
            'image'=>'jus-jeruk-kiwi.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>4,
            'name'=>'Jus Mangga Jeruk',
            'price'=>25000,
            'sold'=>0, 
            'description'=>'Jus Buah Mangga dan Jeruk',
            'image'=>'jus-mangga-jeruk.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>4,
            'name'=>'Jus Melon',
            'price'=>25000,
            'sold'=>0, 
            'description'=>'Jus Buah Melon',
            'image'=>'jus-melon.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>4,
            'name'=>'Jus Pepaya',
            'price'=>25000,
            'sold'=>0, 
            'description'=>'Jus Buah Pepaya',
            'image'=>'jus-pepaya.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>4,
            'name'=>'Jus Pisang',
            'price'=>25000,
            'sold'=>0, 
            'description'=>'Jus Buah Pisang',
            'image'=>'jus-pisang.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>4,
            'name'=>'Jus Stroberi Semangka',
            'price'=>25000,
            'sold'=>0, 
            'description'=>'Jus Buah Stroberi dan Semangka',
            'image'=>'jus-stroberi-semangka.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>4,
            'name'=>'Jus Taro',
            'price'=>30000,
            'sold'=>0, 
            'description'=>'Jus Taro',
            'image'=>'jus-taro.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>1,
            'name'=>'Kwetiau Udang',
            'price'=>50000,
            'sold'=>0, 
            'description'=>'Kwetiau Goreng dengan Udang',
            'image'=>'kwetiau-udang.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Lumpia Sayur',
            'price'=>60000,
            'sold'=>0, 
            'description'=>'Lumpia dengan isian sayur',
            'image'=>'lumpia-sayur.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>1,
            'name'=>'Nasi Goreng Abon',
            'price'=>55000,
            'sold'=>0, 
            'description'=>'Nasi Goreng dengan Abon Sapi',
            'image'=>'nasi-goreng-abon.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>1,
            'name'=>'Nasi Goreng Komplit',
            'price'=>60000,
            'sold'=>0, 
            'description'=>'Nasi Goreng Komplit dengan Sosis Sapi dan Sayur',
            'image'=>'nasi-goreng-komplit.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>1,
            'name'=>'Nasi Goreng Putih',
            'price'=>60000,
            'sold'=>0, 
            'description'=>'Nasi Goreng Putih Tanpa Kecap Manis',
            'image'=>'nasi-goreng-putih.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>1,
            'name'=>'Nasi Telur Nugget',
            'price'=>60000,
            'sold'=>0, 
            'description'=>'Nasi dengan Telur dan Nugget',
            'image'=>'nasi-telur-nugget.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>1,
            'name'=>'Nasi Tumpeng Komplit',
            'price'=>70000,
            'sold'=>0, 
            'description'=>'Nasi Tumpeng Komplit dengan Tempe, Udang dan Peyek Kacang',
            'image'=>'nasi-tumpeng-komplit.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>3,
            'name'=>'Pisang Coklat Keju',
            'price'=>25000,
            'sold'=>0, 
            'description'=>'Pisang dengan Topping Coklat Keju',
            'image'=>'pisang-coklat-keju.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>3,
            'name'=>'Roti Goreng Ayam',
            'price'=>80000,
            'sold'=>0, 
            'description'=>'Roti Goreng dengan Isian Daging Ayam',
            'image'=>'roti-goreng-ayam.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>3,
            'name'=>'Roti Pisang Coklat',
            'price'=>70000,
            'sold'=>0, 
            'description'=>'Roti dengan Isian Pisang Coklat',
            'image'=>'roti-pisang-coklat.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Sate Tuna',
            'price'=>75000,
            'sold'=>0, 
            'description'=>'Sate Daging Ikan Tuna',
            'image'=>'sate-tuna.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>3,
            'name'=>'Singkong Coklat Keju',
            'price'=>30000,
            'sold'=>0, 
            'description'=>'Singkong dengan Topping Coklat dan Keju',
            'image'=>'singkong-coklat-keju.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Sosis Kentang',
            'price'=>25000,
            'sold'=>0, 
            'description'=>'Sosis Kentang Goreng',
            'image'=>'sosis-kentang.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>1,
            'name'=>'Spageti Tuna',
            'price'=>40000,
            'sold'=>0, 
            'description'=>'Spageti dengan Topping Daging Ikan Tuna',
            'image'=>'spageti-tuna.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>1,
            'name'=>'Steak Ayam',
            'price'=>55000,
            'sold'=>0, 
            'description'=>'Steak Ayam dengan Kentang Goreng, Buncis dan Timun',
            'image'=>'steak-ayam.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Tahu Isi',
            'price'=>40000,
            'sold'=>0, 
            'description'=>'Tahu dengan Isian Sayur',
            'image'=>'tahu-isi.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Telur Balado',
            'price'=>55000,
            'sold'=>0, 
            'description'=>'Telur Balado dengan Topping Udang Kering',
            'image'=>'telur-balado.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Telur Bumbu Arsik',
            'price'=>50000,
            'sold'=>0, 
            'description'=>'Telur dengan Bumbu Arsik',
            'image'=>'telur-bumbu-arsik.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Telur Gulung',
            'price'=>40000,
            'sold'=>0, 
            'description'=>'Telur Gulung dengan Saos Tomat dan Mayonaise',
            'image'=>'telur-gulung.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Telur Mayonaise',
            'price'=>35000,
            'sold'=>0, 
            'description'=>'Telur dengan Isian Campuran Kuning Telur dan Mayonaise',
            'image'=>'telur-mayonaise.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Telur Omelet',
            'price'=>40000,
            'sold'=>0, 
            'description'=>'Telur Omelet dengan Timun',
            'image'=>'telur-omelet.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>2,
            'name'=>'Udang Saus Mentega',
            'price'=>60000,
            'sold'=>0, 
            'description'=>'Udang Tumis dengan Saus Mentega',
            'image'=>'udang-saus-mentega.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('menus')->insert([
            'category_id'=>3,
            'name'=>'Zebra Cake',
            'price'=>80000,
            'sold'=>0, 
            'description'=>'Kue Bolu Belang Rasa Coklat',
            'image'=>'zebra-cake.jpg',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]); 
    }
}
