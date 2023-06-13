<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Pengajar;
class LandingPageController extends Controller
{
    public function hero(){
        $kelas = Kelas::all();
        return view('users.layout.hero',compact('kelas'));

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
}
