<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peserta;
use App\Models\Pengajar;
use App\Models\Kategori;

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
                ->get();*/
        
                //query untuk menampilkan jumlah produk per kategori (pie chart)
        $ar_jumlah = DB::table('materi')
        ->join('kelas', 'kelas.id', '=', 'materi.kelas_id')
        ->selectRaw('kelas.nama, count(materi.kelas_id) as jumlah')
        ->groupBy('kelas.nama')
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

        //$pesertacount = Peserta::count();
        //$pengajartacount = Pengajar::count();
        //$kelascount = Kategori::count();

        return view('admin.dashboard.index', compact('ar_jumlah','jml_peserta','jml_pengajar','jml_kelas'));
    }
}
