<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;
use App\Models\RekapanObat;

class KelolaObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['obats'] = Obat::all();
        $data['kategoris'] = Kategori::all();
        return view('admin.obat.index')->with($data);
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
            'nama_obat' => 'required|unique:obats,nama_obat',
            'kategori_id' => 'required',
            'stok_obat' => 'required|integer',
            'harga_obat' => 'required|numeric',
            'expired_obat' => 'required'
        ]);

        try {
            Obat::create($request->all());
            $obat = Obat::latest()->first();

            RekapanObat::create([
                'obat_id' => $obat->id,
                'jumlah' => $request->stok_obat,
                'status' => 1
            ]);
            $notification = [
                'alert-type' => 'success',
                'message' => 'Berhasil Menambah Data Obat',
            ];
        } catch (\Throwable $th) {
            $obat = Obat::latest()->delete();
            return redirect()
                ->back()
                ->withErrors($th->getMessage());
        }
        return redirect()
        ->back()
        ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        $data['obat'] = $obat;
        return view('admin.obat.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        return $obat;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        
        $validate = $request->validate([
            'nama_obat' => 'required',
            'kategori_id' => 'required',
            'stok_obat' => 'required|integer',
            'harga_obat' => 'required|numeric',
            'expired_obat' => 'required'
        ]);
        $jumlah_masuk = $request->stok_obat;
        if($jumlah_masuk < $obat->stok_obat){
            $notification = [
                'alert-type' => 'error',
                'message' => 'Tidak Bisa Mengurangi Stok Obat. Silahkan Klik Tombol Lihat Untuk Mengurangi Stok Barang',
            ];
            return redirect()->back()->with($notification);
        }

        $jumlah_masuk = $request->stok_obat - $obat->stok_obat;
        $data = $request->all();
        try {
            $obat->update($data);
            
            RekapanObat::create([
                'obat_id' => $obat->id,
                'status' => 1,
                'jumlah' => $jumlah_masuk
            ]);
            $notification = [
                'alert-type' => 'success',
                'message' => 'Update Data Berhasil',
            ];
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th.getMessage());
        } 
        return redirect()
            ->back()
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();
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
        $obat = Obat::where('id',$request->id)->first();
        $jumlah = $request->jumlah;
        $stok = $obat->stok_obat;
        
        if($request->pilihan === "tambah"){
            $pilihan = $stok + $jumlah;
            $status = 1;
            $obat->update([
                'stok_obat' => $pilihan
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
        $obat->update([
            'stok_obat' => $pilihan
        ]);
        RekapanObat::create([
            'obat_id' => $obat->id,
            'jumlah' => $jumlah,
            'status' => $status
        ]);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Berhasil Memperbarui Stok Obat',
        ];
        return redirect()->back()->with($notification);
    }
}
