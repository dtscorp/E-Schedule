<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator\validateEnum;

class pengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajar = Pengajar::all();
        return view('admin.pengajar.index', compact('pengajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengajar = Pengajar::all();
        //arahkan ke form input data
        return view('admin.pengajar.create',compact('pengajar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate([
            'nip' => 'required|unique:pengajar|max:5',
            'nama' => 'required|max:45',
            'gender' => 'required',
            'telp' => 'required|max:20',
            'email' => 'required|max:45',
            'alamat' => 'required|max:70',
            'foto' => 'nullable|max:45',
            //'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ],
        //custom pesan errornya
        [
            'nip.required'=>'NIP Wajib Diisi',
            'nip.unique'=>'NIP Sudah Ada (Terduplikasi)',
            'nip.max'=>'NIP Maksimal 5 karakter',
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Nama Maksimal 45 karakter',
            'gener.required'=>'Gender Wajib Diisi',
            'telp.required'=>'Telp Wajib Diisi',
            'telp.integer'=>'Telpon Harus Berupa Angka',
            'email.required'=>'Email Wajib Diisi',
            'alamat.required'=>'Alamat Wajib Diisi',
        ]
        );

        //lakukan update data dari request form edit
        DB::table('pengajar')->insert(
            [
                'nip'=>$request->nip,
                'nama'=>$request->nama,
                'gender'=>$request->gender,
                'telp'=>$request->telp,
                'email'=>$request->email,
                'alamat'=>$request->alamat,
                'foto'=>$request->foto,
                //'updated_at'=>now(),
            ]);

            return redirect()->route('pengajar.index')
                        ->with('success','Data Pengajar Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajar = Pengajar::find($id);
        return view('admin.pengajar.detail',compact('pengajar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengajar= Pengajar::find($id);
        return view('admin.pengajar.edit', compact('pengajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate([
            'nip' => 'required|unique:pengajar|max:5',
            'nama' => 'required|max:45',
            'gender' => 'required',
            'telp' => 'required|max:20',
            'email' => 'required|max:45',
            'alamat' => 'required|max:70',
            'foto' => 'nullable|max:45',
            //'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ],
        //custom pesan errornya
        [
            'nip.required'=>'NIP Wajib Diisi',
            'nip.unique'=>'NIP Sudah Ada (Terduplikasi)',
            'nip.max'=>'NIP Maksimal 5 karakter',
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Nama Maksimal 45 karakter',
            'gender.required'=>'Gender Wajib Diisi',
            'telp.required'=>'Telp Wajib Diisi',
            'telp.integer'=>'Telpon Harus Berupa Angka',
            'email.required'=>'Email Wajib Diisi',
            'alamat.required'=>'Alamat Wajib Diisi',
        ]
        );

        //lakukan update data dari request form edit
        DB::table('pengajar')->where('id',$id)->update(
            [
                'nip'=>$request->nip,
                'nama'=>$request->nama,
                'gender'=>$request->gender,
                'telp'=>$request->telp,
                'email'=>$request->email,
                'alamat'=>$request->alamat,
                'foto'=>$request->foto,
                //'updated_at'=>now(),
            ]);

        return redirect('/pengajar'.'/'.$id)
                        ->with('success','Data Pengajar Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengajar::where('id',$id)->delete();
        return redirect()->route('pengajar.index')
                        ->with('success','Data Pengajar Berhasil Dihapus');
    }
}
