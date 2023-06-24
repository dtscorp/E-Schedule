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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class jadwalController extends Controller
{
    /**
     *Display a listing of the resource.
     */

    public function index(Request $request)
{
    $query = \Illuminate\Support\Facades\DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
        ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi', 'pengajar.nama as pengajar', 'peserta.nama as peserta')
        ->orderBy('penjadwalan_kelas.id', 'desc');

    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where(function ($q) use ($searchTerm) {
            $q->where('penjadwalan_kelas.kode_kelas', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('penjadwalan_kelas.kelas', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('materi.nama', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('pengajar.nama', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('peserta.nama', 'LIKE', '%' . $searchTerm . '%');
        });

        if (Auth::user()->role_access == 'pengajar') {
           $jadwal = DB::table('penjadwalan_kelas')
                ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
                ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
                ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
                ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar')
                ->orderBy('penjadwalan_kelas.id', 'desc')->where('pengajar_id',Auth::user()->pengajar_id)
                ->get();
        }
        $jadwal = DB::table('penjadwalan_kelas')
                ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
                ->join('peserta', 'peserta.id', '=', 'penjadwalan_kelas.peserta_id')
                ->join('pengajar', 'pengajar.id', '=', 'penjadwalan_kelas.pengajar_id')
                ->select('penjadwalan_kelas.*', 'materi.nama as materi','pengajar.nama as pengajar','peserta.nama as peserta')
                ->orderBy('penjadwalan_kelas.id', 'desc')
                ->get();
    }

    $jadwal = $query->get();

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
            'kode_kelas' => 'required|max:45',
            'pengajar_id'=>'required|max:11',
            'peserta_id'=>'required|max:11',
            'kelas' => 'required|max:45',

        ],
        //custom pesan errornya
        [
            'kode_kelas.required'=>'Nama Wajib Diisi',
            'kode_kelas.max'=>'maksimal 45 kata',
            'pengajar_id.required'=>'Wajib Diisi',
            'pengajar_id.max'=>'maksimal 11 angka',
            'peserta_id.required'=>'Wajib Diisi',
            'peserta_id.max'=>'maksimal 11 angka',
            'kelas.required'=>'Wajib Diisi',
            'kelas.max'=>'maksimal 45 kata',
        ]);
        $jadwal = jadwal::find($id);
        $jadwal->pengajar_id = $request->pengajar_id;
        $jadwal->peserta_id = $request->peserta_id;
        $jadwal->materi_id = $request->materi_id;
        $jadwal->kode_kelas = $request->kode_kelas;
        $jadwal->kelas = $request->kelas;
        $jadwal->jam_masuk = $request->jam_masuk;
        $jadwal->jam_keluar = $request->jam_keluar;
        $jadwal->tgl_mulai = $request->tgl_mulai;
        $jadwal->tgl_akhir = $request->tgl_akhir;
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
        $jadwal = DB::table('penjadwalan_kelas')
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
        $jadwal = DB::table('penjadwalan_kelas')
        ->join('materi', 'materi.id', '=', 'penjadwalan_kelas.materi_id')
        ->select('penjadwalan_kelas.*', 'materi.nama as materi')
        ->orderBy('penjadwalan_kelas.id', 'desc')
        ->get();

        $jumlahPeserta = DB::table('penjadwalan_kelas')->select( DB::raw('COUNT(peserta_id) as peserta'))->count();
        $materi = Materi::all();
        $pengajar = Pengajar::all();
        $pdf = PDF::loadView('admin.jadwal.pengajarPDF',['jadwal'=>$jadwal,'materi'=>$materi,'pengajar'=>$pengajar, 'jumlahPeserta'=>$jumlahPeserta]);
       return $pdf->download('Surat-tugas.pdf');

    }

}
