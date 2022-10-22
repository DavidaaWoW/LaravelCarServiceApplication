<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brand')->insert([
            'name' => 'audi',
            'logo' => 'https://autocomplex78.ru/wp-content/uploads/2020/07/audi-2048x1152.png'
        ]);
        DB::table('brand')->insert([
            'name' => 'bmw',
            'logo' => 'https://main-cdn.sbermegamarket.ru/big2/hlr-system/1481104/100023608402b0.jpg'
        ]);
        DB::table('car')->insert([
            'name' => 'Audi Q7',
            'image' => 'http://cdn.motorpage.ru/Photos/800/3C97.jpg',
            'brandId' => 1
        ]);
        DB::table('car')->insert([
            'name' => 'BMW i8',
            'image' => 'https://stylegarage.ru/uploads/_carbrand/id487/bmw-i8.jpg',
            'brandId' => 2
        ]);
    }
}
