<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ujian = explode('-', $request->ujian)[0];
        $kode = explode('-', $request->ujian)[1];
        // dd($ujian, $kode);
        Sesi::create([
            'id_ujian' => $ujian,
            'sesi' => $request->sesi,
            'kode' => $kode
        ]);

        return redirect()->back()->with('success', $request->sesi . ' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sesi $sesi, $id)
    {
        $sesi = Sesi::where('id', $id)->first();
        return response()->json($sesi);
    }

    public function peserta($id)
    {
        $sesi = Sesi::with('ujian')->find($id);
        return response()->json([
            'id_ujian' => $sesi->id_ujian,
            'id_sesi' => $sesi->id_sesi,
            'ujian' => $sesi->ujian->nama,
            'sesi' => $sesi->sesi,
            'kode' => $sesi->kode
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sesi $sesi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sesi $sesi, $id)
    {
        $ujian = explode('-', $request->ujian)[0];
        $kode = explode('-', $request->ujian)[1];
        Sesi::where('id', $id)->update([
            'id_ujian' => $ujian,
            'sesi' => $request->sesi,
            'kode' => $kode
        ]);

        return redirect()->back()->with('success', $request->sesi . ' berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sesi $ujian, $id)
    {
        $nama = Sesi::where('id', $id)->pluck('sesi')->first();
        Sesi::where('id', $id)->delete();

        return redirect()->back()->with('success', $nama . ' berhasil dihapus');
    }
}
