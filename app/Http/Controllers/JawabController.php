<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Jawab;
use Illuminate\Http\Request;

class JawabController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jawab $jawab, $id)
    {
        $jawabs = Jawab::where('id_ujian', $id)->get();
        $kuncis = Bank::pluck('jawaban')->toArray();
        $kolom = $jawabs->first()->getAttributes();

        return view('auth.pages.jawab', compact('jawabs', 'kolom', 'kuncis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jawab $jawab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jawab $jawab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jawab $jawab)
    {
        //
    }
}
