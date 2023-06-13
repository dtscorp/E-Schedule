<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengajar;
use App\Models\Peserta;
class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }   
    public function create()
    {
        $pengajar = Pengajar::all();
        $peserta = Peserta::all();
        return view('admin.user.create',compact('pengajar','peserta'));
    }
}
