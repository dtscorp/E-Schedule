<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jadwal;
use PHPUnit\Framework\TestSize\Known;


class jadwalController extends Controller
{
    /**
     *Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
                ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
                ->select('penjadwalan_kelas.*', 'materi.nama as materi')
                ->orderBy('penjadwalan_kelas.id', 'desc')
                ->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jadwal.create');
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
        jadwal::create($request->all());
        return redirect()->route('jadwal.index')
                        ->with('success','Data jadwal Baru Berhasil Disimpan');
    }
    public function edit(string $id)
    {
        $jadwal= jadwal::find($id);
        return view('admin.jadwal.edit', compact('jadwal'));
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
        $jadwal = jadwal::find($id);
        $jadwal->nama = $request->nama;
        $jadwal->save();
        return redirect()->route('jadwal.index')
        ->with('success','Data jadwal Baru Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        jadwal::where('id',$id)->delete();
        return redirect()->route('jadwal.index')
                        ->with('success','Data jadwal Berhasil Dihapus');
    }
}
