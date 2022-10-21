<?php

namespace Database\Seeders;

use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'Mie Ayam',
            'description' => 'Mie Ayam Bangka, Mie Ayam Kampung Jakarta, Mie Ayam Wonogiri',
            'price' => 15000,
            'stock' => 100
        ]);

        Product::create([
            'title' => 'Ayam Geprek',
            'description' => 'Ayam Geprek Jumbo Keju, Ayam Geprek Jumbo Sambal Limo, Ayam Geprek Jumbo Sambal Bawang, Ayam Geprek Jumbo Sambal Ijo, Ayam Geprek Jumbo Sambal Merah Spesial, Ayam Geprek Jumbo Sambal Ijo Spesial',
            'price' => 17000,
            'stock' => 150
        ]);

        Product::create([
            'title' => 'Es Jeruk',
            'description' => 'Es Jeruk Kunci, Es Jeruk Yakult, Es Jeruk Kelapa Muda, Es Jeruk Spesial, Es Jeruk Kunci Kolang Kaling, Es Jeruk Susu Cendol Cincau, Es Jeruk Kopyor, Es Jeruk Timun, Es Jeruk Markisa',
            'price' => 5000,
            'stock' => 300
        ]);

        Product::create([
            'title' => 'Es Teh',
            'description' => 'Es Teh Leci, Es Teh Manis, Es Teh Susu, Es Teh Cincau',
            'price' => 4000,
            'stock' => 200
        ]);
    }
}



