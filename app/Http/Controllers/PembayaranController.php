<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Helper\Images;
use Carbon\Carbon;

class PembayaranController extends Controller
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
        $tahun = Carbon::now()->year;
        $validasi = $request->validate([
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'semester' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $validasi['prodi'] = auth()->user()->prodi;
        $validasi['tahun_ajaran'] = $tahun;
        $validasi['pict_bukti'] = '1';
        $validasi['status'] = 'p';

        $validasiImage = $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $pembayaran = Pembayaran::create($validasi);

        return redirect('/dashboard')->with('success','sukses upload bukti pembayaran SPP');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
