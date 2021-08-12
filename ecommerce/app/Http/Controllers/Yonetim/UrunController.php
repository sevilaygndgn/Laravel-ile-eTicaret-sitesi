<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urun;
use App\Models\Kategori;


class UrunController extends Controller
{
      public function index()
    {
        if (request()->filled('aranan')) {
            request()->flash();
            $aranan = request('aranan');
            $list = Urun::where('urun_adi', 'like', "%$aranan%")
                ->orderByDesc('created_at')
                ->paginate(8)
                ->appends(['aranan' => $aranan]);
        } else {
        
            $list = Urun::orderByDesc('created_at')->paginate(8);
        }
    
        return view('yonetim.urun.index', compact('list'));
    }

     public function form($id = 0)
    {
        $entry = new Urun;
        $urun_kategoriler = [];
        if($id >0){
            $entry = Urun::find($id);
            $urun_kategoriler = $entry->kategoriler()->pluck('kategori_id')->all();
        }

        $kategoriler = Kategori::all();


        return view('yonetim.urun.form', compact('entry', 'kategoriler'));
    }

     public function kaydet($id = 0,Request $request)
    {
        $data = request()->only('urun_adi', 'slug', 'aciklama','fiyat');

        
        
        $this->validate(request(), [
            'urun_adi' => 'required',
            'fiyat' => 'required',
            'slug' => 'required',

        ]);
        
        if ($id > 0) {
            $entry = Urun::where('id', $id)->firstOrFail();
            $entry->update($data);
            $entry->kategoriler()->sync($request->kategoriler);
        } else {
            $entry = Urun::create($data);
            $entry->kategoriler()->attach($request->kategoriler);
        }
        
        if(request()->hasFile('urunresmi')){
            $this->validate(request(),[
                'urunresmi' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);

            $urunresmi = request()->file('urunresmi');
            $urunresmi = request()->urunresmi;

            $dosyaadi = $urunresmi->hashName();

        }

        return redirect()
            ->route('yonetim.urun.duzenle', $entry->id)
            ->with('mesaj', ($id > 0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur', 'success');
    }

      public function sil($id)
    {
        $urun = Urun::find($id);
        $urun->kategoriler()->detach();
        $urun->delete();
        
        return redirect()
            ->route('yonetim.urun')
            ->with('mesaj', 'Kayıt silindi')
            ->with('mesaj_tur', 'success');
    }
   
}
