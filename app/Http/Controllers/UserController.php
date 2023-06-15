<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengajar;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    public function store(Request $request)
    {
        $request->validate(
            [
                // 'id_card' => 'required|unique:pengajar|max:5',
                'name' => 'required|max:45',
                'email' => 'required|max:45',
                'password' => 'required|confirmed|min:8',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:2048',
            ],
            //custom pesan errornya
            [
                // 'id_card.required' => 'NIP/NIK Wajib Diisi',
                // 'id_card.unique' => 'NIP/NIK Sudah Ada (Terduplikasi)',
                // 'id_card.max' => 'NIP/NIK Maksimal 5 karakter',
                'name.required' => 'Nama Wajib Diisi',
                'name.max' => 'Nama Maksimal 45 karakter',
                'email.required' => 'Email Wajib Diisi',
                'email.max' => 'Email maksimal 45 karakter',
                'password.required' => 'Password Wajib Diisi',
                'password.confirmed' => 'Password tidak cocok',
                'password.min' => 'Password minimal 8 karakter',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 2 MB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'File harus jpg,jpeg,png,gif,svg',
            ]
        );

        //Produk::create($request->all());
        //------------apakah user  ingin upload foto--------- --
        if (!empty($request->foto)) {
            $fileName = 'user_' . $request->name . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/images'), $fileName);
        } else {
            $fileName = '';
        }

        //lakukan update data dari request form edit
        DB::table('users')->insert(
            [
                // 'id_card' => $request->id_card,
                'name' => $request->name,
                'email' => $request->email,
                'password' =>Hash::make($request->password),
                'foto' => $fileName,
            ]
        );

        return redirect()->route('user.index')
            ->with('success', 'Data Users Berhasil Disimpan');
    }
}
