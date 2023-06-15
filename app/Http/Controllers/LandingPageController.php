<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Pengajar;
use App\Models\jadwal;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function hero(){
        $kelas = Kelas::all();
        return view('users.hero',compact('kelas'));

    }
    public function teacher(){
        $pengajar = Pengajar::all();
        return view('users.teacher', compact('pengajar'));

    }
    public function kelas(){
        $materi = Materi::all();
        $kelas = Kelas::all();
        return view('users.kelas',compact('kelas','materi'));
    }
    public function jadwal(){
       $id =  Auth::user()->id;
        if ( Auth::user()->role_access = 'admin') {
            $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
            ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
            ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
            ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
            ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
            ->orderBy('penjadwalan_kelas.id', 'desc')
            ->get();
        }else{
            $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
            ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
            ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
            ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
            ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
            ->orderBy('penjadwalan_kelas.id', 'desc')->where('penjadwalan_kelas.id','=',$id)
            ->get();
        }   
      
        return view('admin.jadwal.index', compact('jadwal'));
    }
}
