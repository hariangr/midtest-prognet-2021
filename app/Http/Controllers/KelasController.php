<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkuls = Matkul::all();
        $dosens = Dosen::all();
        return view('dashboard.kelas.index', compact('matkuls', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|min:1|max:1',
            'matkuls_id' => 'required|exists:matkuls,id',
            'dosens_id' => 'required|exists:dosens,id',
        ]);

        Log::info($request);

        if (Kelas::where('matkuls_id', $request['matkuls_id'])->where('class_name', $request['class_name'])->first() != null) {
            return back()->withInput()->with('errMsg', 'Kelas sudah ada');
        }

        $data = Kelas::create([
            "class_name" => $request['class_name'],
            "matkuls_id"  => $request['matkuls_id'],
            "dosens_id" => $request['dosens_id'],
            "is_ongoing" => isset($request['is_ongoing']),
        ]);

        return back()->with('success', 'Berhasil menambah kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matkul  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kela)
    {
        $kelas = $kela; 
        $matkul = $kelas->matkul();
        $dosen = $kelas->dosen();
        $mahasiswas = Mahasiswa::all();
        return view('dashboard.kelas.show', compact('kelas', 'matkul', 'dosen', 'mahasiswas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matkul  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'class_name' => 'required|string',
            'matkuls_id' => 'required|exists:matkuls,id',
            'dosens_id' => 'required|exists:dosens,id',
        ]);

        $exist = Kelas::where('matkuls_id', $request['matkuls_id'])->where('class_name', $request['class_name'])->first();
        if ($exist != null && $exist->id != $kela->id) {
            return back()->withInput()->with('errMsg', 'Kelas sudah ada');
        }

        $kela['class_name'] = $request['class_name'];
        $kela['matkuls_id'] = $request['matkuls_id'];
        $kela['dosens_id'] = $request['dosens_id'];
        $kela['is_ongoing'] = isset($request['is_ongoing']);
        $kela->save();

        return back()->with('success', 'Berhasil mengubah kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        Kelas::destroy($kela->id);
        return back()->with('success', 'Berhasil menghapus kelas');
    }
}
