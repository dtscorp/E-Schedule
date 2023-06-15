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

        $pesertacount = Peserta::count();
        $pengajartacount = Pengajar::count();
        $kelascount = Kategori::count();

        return view('admin.dashboard',['peserta_count'=>$pesertacount,'pengajar_count'=>$pengajartacount,
        'kelas_count'=>$kelascount]);
    }
}
