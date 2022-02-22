<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profil-sekolah.index', ['sekolah' => ProfilSekolah::first()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilSekolah  $profilSekolah
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilSekolah $profilSekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilSekolah  $profilSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilSekolah $profilSekolah)
    {
        return view('profil-sekolah.edit', ['sekolah' => ProfilSekolah::first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilSekolah  $profilSekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $profilSekolah = ProfilSekolah::find($id);
        $profilSekolah->nama = $request->nama;
        $profilSekolah->npsn = $request->npsn;
        $profilSekolah->alamat = $request->alamat;
        $profilSekolah->provinsi = $request->selectedProvince;
        $profilSekolah->kota = $request->selectedCity;
        $profilSekolah->kecamatan = $request->selectedDistrict;
        $profilSekolah->kelurahan = $request->selectedVillage;
        $profilSekolah->kodepos = $request->kodepos;
        $profilSekolah->telp = $request->telp;
        $profilSekolah->email = $request->email;
        $profilSekolah->website = $request->website;
        $profilSekolah->save();

        return redirect()->route('sekolah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilSekolah  $profilSekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilSekolah $profilSekolah)
    {
        //
    }
}
