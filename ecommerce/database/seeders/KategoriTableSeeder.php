<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('kategori')->truncate();

        $id=DB::table('kategori')->insertGetId(['kategori_adi'=>'Yiyecek', 'slug'=>'yiyecek']);
        DB::table('kategori')->insert(['kategori_adi'=>'Pizza', 'slug'=>'pizza', 'ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Döner', 'slug'=>'doner', 'ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Hamburger', 'slug'=>'hamburger', 'ust_id'=>$id]);
          
        $id=DB::table('kategori')->insertGetId(['kategori_adi'=>'İçecek', 'slug'=>'icecek']);
        DB::table('kategori')->insert(['kategori_adi'=>'Kola', 'slug'=>'kola', 'ust_id'=>$id]);
        DB::table('kategori')->insert(['kategori_adi'=>'Sprite', 'slug'=>'sprite', 'ust_id'=>$id]);
      
        
          DB::table('kategori')->insert(['kategori_adi'=>'Aperitif', 'slug'=>'aperetif']);
           DB::table('kategori')->insert(['kategori_adi'=>'Tatlı', 'slug'=>'tatlı']);
            DB::table('kategori')->insert(['kategori_adi'=>'Kişiye özel', 'slug'=>'kişiye-özel']);
            DB::table('kategori')->insert(['kategori_adi'=>'İndirim', 'slug'=>'indirim']);
            DB::table('kategori')->insert(['kategori_adi'=>'İndirim', 'slug'=>'indirim']);
            DB::table('kategori')->insert(['kategori_adi'=>'İndirim', 'slug'=>'indirim']);
    }
}  