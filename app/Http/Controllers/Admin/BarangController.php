<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;
use App\Models\RiwayatBarang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getBarang()
    {
        return Barang::with('kategori')->get();
    }

    public function getKategori()
    {
        return Kategori::all();
    }

    public function getOneBarang($id)
    {
        return Barang::where('id',$id)->first();
    }

    public function index()
    {
        $data['barangs'] = $this->getBarang();
        $data['kategoris'] = $this->getKategori();
        return view('admin.barang.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_barang' => 'required|unique:barangs,nama_barang',
            'kategori_id' => 'required',
            'stok_barang' => 'required|integer',
            'photo_barang' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $foto = $request->photo_barang;
        $namaBarang = $request->nama_barang;
        $stok = $request->stok_barang;

        if ($request->hasFile('photo_barang')) {
            $extension = $foto->extension();
            $filename = 'photo_barang_' . $namaBarang . '_' . Carbon::now() . '.' . $extension;
            $foto->storeAs('public/images/barang', $filename);
            $fotoDb = $filename;
        } else {
            $fotoDb = null;
        }
        try {
            Barang::create([
                'nama_barang' => $namaBarang,
                'kategori_id' => $request->kategori_id,
                'photo_barang' => $fotoDb,
                'stok_barang' => $stok
            ]);
            $barang = Barang::latest()->first();

            RiwayatBarang::create([
                'barang_id' => $barang->id,
                'jumlah' => $stok,
                'status' => 1
            ]);
            $notification = [
                'alert-type' => 'success',
                'message' => 'Berhasil Menambah Barang',
            ];
            return redirect()
                ->back()
                ->with($notification);
        } catch (\Throwable $th) {
            $notification = [
                'alert-type' => 'error',
                'message' => 'Gagal. Coba Ulangi',
            ];
            return redirect()
                ->back()
                ->with($notification);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        $data['barang'] = $this->getOneBarang($barang->id);
        return view('admin.barang.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return $barang;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        
        $validate = $request->validate([
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'stok_barang' => 'required|integer',
            'photo_barang' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $jumlah = $request->stok_barang;
        if($jumlah < $barang->stok_barang){
            $notification = [
                'alert-type' => 'error',
                'message' => 'Tidak Bisa Mengurangi Stok Barang. Silahkan Klik Tombol Lihat Untuk Mengurangi Stok Barang',
            ];
            return redirect()->back()->with($notification);
        }
        $foto = $request->photo_barang;
        $namaBarang = $request->nama_barang;

        if ($request->hasFile('photo_barang')) {
            $extension = $foto->extension();
            $filename = 'photo_barang_' . $namaBarang . '_' . Carbon::now() . '.' . $extension;
            $foto->storeAs('public/images/barang', $filename);
            $fotoDb = $filename;
            Storage::delete('public/images/barang/' . $barang->photo_barang);
        } else {
            $fotoDb = $barang->photo_barang;
        }
        $jumlah = $request->stok_barang - $barang->stok_barang; 
        $barang->update([
            'nama_barang' => $namaBarang,
            'kategori_id' => $request->kategori_id,
            'stok_barang' => $jumlah,
            'photo_barang' => $fotoDb,
        ]);
        
        RiwayatBarang::create([
            'barang_id' => $barang->id,
            'status' => 1,
            'jumlah' => $jumlah
        ]);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Update Data Berhasil',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        if ($barang->photo_barang !== null) {
            Storage::delete('public/images/barang/' . $barang->photo_barang);
        }
        $barang->delete();
        $notification = [
            'alert-type' => 'success',
            'message' => 'Berhasil Menghapus',
        ];
        return redirect()
        ->back()
        ->with($notification);
    }
    
    public function stok(Request $request)
    {
        $validate = $request->validate([
            'jumlah' => 'required|integer'
        ]);
        $barang = $this->getOneBarang($request->id);
        $jumlah = $request->jumlah;
        $stok = $barang->stok_barang;
        
        if($request->pilihan === "tambah"){
            $pilihan = $stok + $jumlah;
            $status = 1;
            $barang->update([
                'stok_barang' => $pilihan
            ]);
        }else{
            $status = 0;
            $pilihan = $stok - $jumlah;
            if($jumlah > $stok){
                $notification = [
                    'alert-type' => 'error',
                    'message' => 'Tidak Bisa Mengurangi Melebihi Jumlah Stok Saat Ini',
                ];
                return redirect()->back()->with($notification);
            }
        }
        $barang->update([
            'stok_barang' => $pilihan
        ]);
        RiwayatBarang::create([
            'barang_id' => $barang->id,
            'jumlah' => $jumlah,
            'status' => $status
        ]);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Berhasil Memperbarui Stok Barang',
        ];
        return redirect()->back()->with($notification);
    }
}
