<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\PseudoTypes\False_;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.mahasiswa.index');
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
            'nim' => 'required|numeric|digits_between:10,10',
            'nama' => 'required|string',
            'angkatan' => 'required|numeric|digits_between:4,4',
        ]);

        if (Mahasiswa::where('nim', $request['nim'])->first() != null) {
            return back()->withInput()->with('errMsg', 'Mahasiswa dengan nim ' . $request['nim'] . ' sudah ada');
        }

        // Log::info($request);

        $_active = False;
        if (isset($request['active'])) {
            $_active = True;
        }

        $mahasiswa = Mahasiswa::create([
            "nim" => $request['nim'],
            "nama"  => $request['nama'],
            "angkatan" => $request['angkatan'],
            "active" => $_active,
        ]);

        return back()->with('success', 'Berhasil menambah mahasiswa dengan nama: ' . $mahasiswa->nama);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::destroy($mahasiswa->id);
        return back()->with('success', 'Berhasil menghapus mahasiswa dengan nama: ' . $mahasiswa->nama);
    }
}
