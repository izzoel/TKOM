<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Sesi;
use App\Models\Admin;
use App\Models\Jawab;
use App\Models\Ujian;
use App\Models\Peserta;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $ujians;
    protected $sesis;
    protected $jawabs;
    protected $pesertas;
    protected $banks;

    public function __construct(Request $request)
    {
        $this->ujians = Ujian::all();
        $this->sesis = Sesi::all();
        $this->jawabs = Jawab::all();
        $this->pesertas = Peserta::all();
        $this->banks = Bank::all();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.pages.admin');
    }

    public function sesi()
    {
        $ujians = $this->ujians;
        $sesis = $this->sesis;
        $pesertas = $this->pesertas;
        return view('auth.pages.sesi', compact('ujians', 'sesis', 'pesertas'));
    }
    public function ujian()
    {
        $ujians = $this->ujians;
        $jawabs = $this->jawabs;
        return view('auth.pages.ujian', compact('ujians', 'jawabs'));
    }
    public function bank()
    {
        $banks = $this->banks;
        return view('auth.pages.bank', compact('banks'));
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
