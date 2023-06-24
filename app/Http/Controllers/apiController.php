<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function getJadwal(){
        $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
        ->orderBy('penjadwalan_kelas.id', 'desc')
        ->get();

        return response()->json(
            [
                'success'=>true,
                'message'=>'Data Produk',
                'data'=>$jadwal
            ]);

    }
}
