<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
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
        return view('dashboard.kelas.index');
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
            'nama' => 'required|string',
            'nidn' => 'required|numeric|digits_between:10,10',
            'email' => 'required|email',
        ]);

        if (Dosen::where('nidn', $request['nidn'])->first() != null) {
            return back()->withInput()->with('errMsg', 'Dosen dengan nidn ' . $request['nidn'] . ' sudah ada');
        }

        $data = Dosen::create([
            "nama" => $request['nama'],
            "nidn"  => $request['nidn'],
            "email" => $request['email'],
            "active" => isset($request['active']),
        ]);

        return back()->with('success', 'Berhasil menambah dosen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matkul  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        return view('dashboard.dosen.show', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matkul  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama' => 'required|string',
            'nidn' => 'required|numeric|digits_between:10,10',
            'email' => 'required|email',
        ]);

        $dosen['nama'] = $request['nama'];
        $dosen['nidn'] = $request['nidn'];
        $dosen['email'] = $request['email'];
        $dosen['active'] = isset($request['active']);
        $dosen->save();

        return back()->with('success', 'Berhasil mengubah dosen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        Dosen::destroy($dosen->id);
        return back()->with('success', 'Berhasil menghapus dosen');
    }
}
