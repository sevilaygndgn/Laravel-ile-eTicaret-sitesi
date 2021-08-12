<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
        public function index()
    {
        if (request()->filled('aranan')) {
            request()->flash();
            $aranan = request('aranan');
            $list = Kategori::where('kategori_adi', 'like', "%$aranan%")
                ->orderByDesc('created_at')
                ->paginate(8)
                ->appends(['aranan' => $aranan]);
        } else {
        
            $list = Kategori::orderByDesc('created_at')->paginate(8);
        }
    
        return view('yonetim.kategori.index', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new Kategori;
        if($id >0){
            $entry = Kategori::find($id);
        }

        $kategoriler = Kategori::all();

        return view('yonetim.kategori.form', compact('entry', 'kategoriler'));
    }

    public function kaydet($id = 0,Request $request)
    {

        $data = request()->only('kategori_adi', 'slug', 'ust_id');
                $data['slug'] =  Str::slug($request->kategori_adi, '-');

        
        $this->validate(request(), [
            'kategori_adi' => 'required',
        ]);
        
        if ($id > 0) {
            $entry = Kategori::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {

            $entry = Kategori::create($data);
        }
        
        return redirect()
            ->route('yonetim.kategori.duzenle', $entry->id)
            ->with('mesaj', ($id > 0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur', 'success');
    }

      public function sil($id)
    {
        $kategori = Kategori::find($id);
        $kategori->urunler()->detach();
        $kategori->delete();
        
        return redirect()
            ->route('yonetim.kategori')
            ->with('mesaj', 'Kayıt silindi')
            ->with('mesaj_tur', 'success');
    }
}
