<?php

namespace App\Http\Controllers;
use App\Models\Peserta;
use PHPUnit\Framework\TestSize\Known;

use Illuminate\Http\Request;

class pesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peserta = Peserta::all();
        return view('admin.peserta.index', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:45',
            'gender' => 'required',
            'telp' => 'required|max:15|min:10',
            'email' => 'required|max:45|unique:peserta',
            'alamat' => 'required'
            //'foto' => 'required|max:45'
        ],
        //custom pesan errornya
        [
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Maksimal 45 karakter',
            'gender.required'=>'Gender Wajib Diisi',
            'telp.required'=>'telp Wajib Diisi',
            'telp.max'=>'Maksimal 15 karakter',
            'telp.min'=>'Minimal 10 Karakter',
            'email.required'=>'Email Wajib Diisi',
            'email.max'=>'Maksimal 45 Karakter',
            'email.unique'=>'Email Telah digunakan',
            'alamat.required'=>'alamat Wajib Diisi'
        ]
        );
        Peserta::create($request->all());
        return redirect()->route('peserta.index')
                        ->with('success','Data peserta Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Peserta::where('id',$id)->delete();
        return redirect()->route('peserta.index')
                        ->with('success','Data Peserta Berhasil Dihapus');
    }
}
