<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;
use PHPUnit\Framework\TestSize\Known;

class PengajarController extends Controller
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
        return view('admin.pengajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:45'
        ],
        //custom pesan errornya
        [
            'nama.required'=>'Nama Wajib Diisi'
        ]
        );
        Pengajar::create($request->all());
        return redirect()->route('pengajar.index')
                        ->with('success','Data Pengajar Baru Berhasil Disimpan');
    }
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
        $request->validate([
            'nama' => 'required|max:45'
        ],
        //custom pesan errornya
        [
            'nama.required'=>'Nama Wajib Diisi'
        ]);
        $Pengajar = Pengajar::find($id);
        $Pengajar->nama = $request->nama;
        $Pengajar->save();
        return redirect()->route('pengajar.index')
        ->with('success','Data Pengajar Baru Berhasil Disimpan');
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
