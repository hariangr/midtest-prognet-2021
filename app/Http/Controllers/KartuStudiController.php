<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\KartuStudi;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KartuStudiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswas_id' => 'required|exists:mahasiswas,id',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        if (KartuStudi::where('mahasiswas_id', $request['mahasiswas_id'])->where('kelas_id', $request['kelas_id'])->first() != null) {
            return back()->withInput()->with('errMsg', 'Mahasiswa sudah terdaftar dalam kelas ini');
        }

        $data = KartuStudi::create([
            "mahasiswas_id" => $request['mahasiswas_id'],
            "kelas_id"  => $request['kelas_id'],
        ]);

        return back()->with('success', 'Berhasil mendaftarkan mahasiswa dalam kelas ini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(KartuStudi $kartustudi)
    {
        KartuStudi::destroy($kartustudi->id);
        return back()->with('success', 'Berhasil menghapus mahasiswa dari kelas');
    }
}
