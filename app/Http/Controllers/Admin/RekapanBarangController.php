<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatBarang;
use PDF;

class RekapanBarangController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('bulan')) {
            $date = explode('-',$request->bulan);
            $data['rekapans'] = RiwayatBarang::whereMonth('created_at', $date[1])->whereYear('created_at', $date[0])->get();
            return view('admin.rekapan_barang.index')->with($data);
        }else{
            $data['rekapans'] = RiwayatBarang::all();
            return view('admin.rekapan_barang.index')->with($data);
        }
    }
    public function print(Request $request)
    {
        $bulan = $request->bulan;
        $rekapans = RiwayatBarang::all();
        if($bulan == null) {
            $rekapans = RiwayatBarang::all();
            $pdf = PDF::loadview('admin.rekapan_barang.print', ['rekapans' => $rekapans]);
        }else{
            $date = explode('-',$bulan);
            $rekapans = RiwayatBarang::whereMonth('created_at', $date[1])->whereYear('created_at', $date[0])->get();
            $pdf = PDF::loadview('admin.rekapan_barang.print', ['rekapans' => $rekapans]);
        }
        return $pdf->download('rekap_barang_'.$bulan.'.pdf');
    }
}
