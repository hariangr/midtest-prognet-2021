<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.matkul.index');
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
            'title' => 'required|string',
            'key' => 'required|string|min:5|max:5',
            'concentration' => 'required|in:tib,tic,mkj,mb',
        ]);

        $data = Matkul::create([
            "title" => $request['title'],
            "key"  => $request['key'],
            "concentration" => $request['concentration'],
            "active" => True,
        ]);

        return back()->with('success', 'Berhasil menambah mata kuliah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matkul  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Matkul $matkul)
    {
        return view('dashboard.matkul.show', compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matkul  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matkul $matkul)
    {
        $request->validate([
            'title' => 'required|string',
            'key' => 'required|string|min:5|max:5',
            'concentration' => 'required|in:tib,tic,mkj,mb',
        ]);

        $_active = False;
        if (isset($request['active'])) {
            $_active = True;
        }

        $matkul['title'] = $request['title'];
        $matkul['key'] = $request['key'];
        $matkul['concentration'] = $request['concentration'];
        $matkul['active'] = $_active;
        $matkul->save();

        return back()->with('success', 'Berhasil mengubah mata kuliah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matkul $matkul)
    {
        Matkul::destroy($matkul->id);
        return back()->with('success', 'Berhasil menghapus mata kuliah');
    }
}
