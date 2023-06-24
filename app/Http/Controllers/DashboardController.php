<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peserta;
use App\Models\Pengajar;
use App\Models\Kelas;

class DashboardController extends Controller
{
    public function index()
    {
        //query untuk grafik stok produk (bar chart)
       /* $ar_stok = DB::table('produk')
                ->select('nama', 'stok')
                ->get();

        //query untuk menampilkan jumlah produk per kategori (pie chart)
        $ar_jumlah = DB::table('produk')
                ->join('jenis', 'jenis.id', '=', 'produk.jenis_id')
                ->selectRaw('jenis.nama, count(produk.jenis_id) as jumlah')
                ->groupBy('jenis.nama')
                ->get();
                //query untuk menampilkan jumlah produk per kategori (pie chart)
        $materi = DB::table('materi')
        ->join('kelas', 'kelas.id', '=', 'materi.kelas_id')
        ->selectRaw('kelas.nama as Kelas, count(materi.kelas_id) as jumlah')
        ->groupBy('kelas.nama')
        ->get();
        $jadwal = DB::table('penjadwalan_kelas')
                ->select('kelas', 'materi_id')
                ->get();
        

        //query untuk menampilkan jumlah pelanggan
        $jml_peserta = DB::table('peserta')
                ->selectRaw('count(*) as jumlah')
                ->get();  
        //dd('#################'.$jml_pelanggan);  

        //query untuk menampilkan jumlah pesanan
        $jml_pengajar = DB::table('pengajar')
                ->selectRaw('count(*) as jumlah')
                ->get(); 
        //query untuk menampilkan jumlah pesanan
        $jml_kelas = DB::table('kelas')
                ->selectRaw('count(*) as jumlah')
                ->get(); 
        $penjadwalan = DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar')
        ->orderBy('penjadwalan_kelas.id', 'desc')
        ->get();  */     

        $pesertacount = Peserta::count();
        $pengajartacount = Pengajar::count();
        $kelascount = Kelas::count();
        $penjadwalan = jadwal::all();

        return view('admin.dashboard.index', ['penjadwalan'=>$penjadwalan, 'peserta'=>$pesertacount, 'pengajar'=>$pengajartacount, 'kelas'=>$kelascount]);
    }
}
