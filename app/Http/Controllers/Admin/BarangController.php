<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;

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
            'photo_barang' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $foto = $request->photo_barang;
        $namaBarang = $request->nama_barang;

        if ($request->hasFile('photo_barang')) {
            $extension = $foto->extension();
            $filename = 'photo_barang_' . $namaBarang . '_' . Carbon::now() . '.' . $extension;
            $foto->storeAs('public/images/barang', $filename);
            $fotoDb = $filename;
        } else {
            $fotoDb = null;
        }

        Barang::create([
            'nama_barang' => $namaBarang,
            'kategori_id' => $request->kategori_id,
            'photo_barang' => $fotoDb,
        ]);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Berhasil Menambah Barang',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
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
            'photo_barang' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
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

        $barang->update([
            'nama_barang' => $namaBarang,
            'kategori_id' => $request->kategori_id,
            'photo_barang' => $fotoDb,
        ]);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Update Berhasil',
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
}
