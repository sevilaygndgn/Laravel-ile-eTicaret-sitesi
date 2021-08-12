<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Urun;

class UrunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //Urun::truncate();
       $faker = \Faker\Factory::create(); 
      for ($i=0; $i < 30 ; $i++) { 
          $urun_adi = $faker->sentence(2);
           Urun::create([
            'urun_adi' => $urun_adi,
            'slug' => str::slug($urun_adi),
            'aciklama' => $faker->sentence(20),
            'fiyat' => $faker->randomFloat(3, 1, 20)
       ]);
      }
    }
}
