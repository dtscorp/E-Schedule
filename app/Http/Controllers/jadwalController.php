<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jadwal;
use App\Models\Kategori;
use App\Models\Materi;
use App\Models\Pengajar;
use App\Models\Peserta;
use PHPUnit\Framework\TestSize\Known;
use Barryvdh\DomPDF\Facade\Pdf;


class jadwalController extends Controller
{
    /**
     *Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
                ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
                ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
                ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
                ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
                ->orderBy('penjadwalan_kelas.id', 'desc')
                ->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materi = Materi::all();
        $pengajar = Pengajar::all();
        $peserta = Peserta::all();
        return view('admin.jadwal.create',compact('materi','pengajar','peserta'));

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|max:45'
        ],
        //custom pesan errornya
        [
            'kelas.required'=>'Nama Wajib Diisi'
        ]
        );
        jadwal::create($request->all());
        return redirect()->route('jadwal.index')
                        ->with('success','Data jadwal Baru Berhasil Disimpan');
    }
    public function edit(string $id)
    {
        $jadwal= jadwal::find($id);
        $materi = Materi::all();
        $pengajar = Pengajar::all();
        $peserta = Peserta::all();
        return view('admin.jadwal.edit', compact('jadwal','materi','pengajar','peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_kelas' => 'required|max:45'
        ],
        //custom pesan errornya
        [
            'kode_kelas.required'=>'Nama Wajib Diisi'
        ]);
        $jadwal = jadwal::find($id);
        $jadwal->pengajar_id = $request->pengajar_id;
        $jadwal->peserta_id = $request->peserta_id;
        $jadwal->materi_id = $request->materi_id;
        $jadwal->kode_kelas = $request->kode_kelas;
        $jadwal->kelas = $request->kelas;
        $jadwal->jam_masuk = $request->jam_masuk;
        $jadwal->jam_keluar = $request->jam_keluar;
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

    public function jadwalPDF(){
        $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
                ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
                ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
                ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
                ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
                ->orderBy('penjadwalan_kelas.id', 'desc')
                ->get();
        $pdf = PDF::loadView('admin.jadwal.jadwalPDF',['jadwal'=>$jadwal]);
       return $pdf->download('Penjadwalan.pdf');

    }

    public function pengajarPDF(){
        $jadwal = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi')
        ->orderBy('penjadwalan_kelas.id', 'desc')
        ->get();
        $materi = Materi::all();
        $pengajar = Pengajar::all();
        $pdf = PDF::loadView('admin.jadwal.pengajarPDF',['jadwal'=>$jadwal,'materi'=>$materi,'pengajar'=>$pengajar]);
       return $pdf->download('Surat-tugas.pdf');

    }


    
}
