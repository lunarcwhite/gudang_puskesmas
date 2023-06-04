<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekapanObat;
use PDF;

class RekapanObatController extends Controller
{
    public function index(Request $request)
    {
        if($request->filled('bulan')) {
            $date = explode('-',$request->bulan);
            $data['rekapans'] = RekapanObat::whereMonth('created_at', $date[1])->whereYear('created_at', $date[0])->get();
            return view('admin.rekapan_obat.index')->with($data);
        }else{
            $data['rekapans'] = RekapanObat::all();
            return view('admin.rekapan_obat.index')->with($data);
        }
    }
    public function print(Request $request)
    {
        $bulan = $request->bulan;
        $rekapans = RekapanObat::all();
        if($bulan == null) {
            $rekapans = RekapanObat::all();
            $pdf = PDF::loadview('admin.rekapan_obat.print', ['rekapans' => $rekapans]);
        }else{
            $date = explode('-',$bulan);
            $rekapans = RekapanObat::whereMonth('created_at', $date[1])->whereYear('created_at', $date[0])->get();
            $pdf = PDF::loadview('admin.rekapan_obat.print', ['rekapans' => $rekapans]);
        }
        return $pdf->download('rekap_keluar_masuk_obat_'.$bulan.'.pdf');
    }
}
