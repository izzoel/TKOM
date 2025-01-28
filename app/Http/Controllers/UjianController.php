<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\Peserta;
use App\Models\Sesi;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ujians = Ujian::all();
        return response()->json($ujians);
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
        Ujian::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'durasi' => $request->durasi
        ]);

        return redirect()->back()->with('success', $request->nama . ' berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ujian $ujian, $id)
    {
        $ujian = Ujian::where('id', $id)->first();
        return response()->json($ujian);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ujian $ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ujian $ujian, $id)
    {
        Ujian::where('id', $id)->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'durasi' => $request->durasi,
            'kode' => $request->kode
        ]);

        return redirect()->back()->with('success', $request->nama . ' berhasil diperbarui');
    }
    public function generate(Request $request, Ujian $ujian, $id)
    {
        $nama = Ujian::where('id', $id)->pluck('nama')->first();
        $kode = '';
        $possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i = 0; $i < 3; $i++) {
            $kode .= $possible[rand(0, strlen($possible) - 1)];
        }
        $possibleAngka = '0123456789';
        for ($i = 0; $i < 2; $i++) {
            $kode .= $possibleAngka[rand(0, strlen($possibleAngka) - 1)];
        }

        Ujian::where('id', $id)->update([
            'kode' => $kode
        ]);
        Sesi::where('id_ujian', $id)->update([
            'kode' => $kode
        ]);

        return redirect()->back()->with('success', 'kode ' . $nama . ' berhasil di generate');
    }
    public function close(Request $request, Ujian $ujian, $id)
    {
        $nama = Ujian::where('id', $id)->pluck('nama')->first();
        $kode = Ujian::where('id', $id)->pluck('kode')->first();

        Ujian::where('id', $id)->update([
            'kode' => ''
        ]);
        Peserta::where('kode', $kode)->delete();
        Sesi::where('kode', $kode)->update([
            'kode' => ''
        ]);

        return redirect()->back()->with('success', 'ujian ' . $nama . ' berhasil ditutup');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ujian $ujian, $id)
    {
        $nama = Ujian::where('id', $id)->pluck('nama')->first();
        Ujian::where('id', $id)->delete();

        return redirect()->back()->with('success', $nama . ' berhasil dihapus');
    }
}
