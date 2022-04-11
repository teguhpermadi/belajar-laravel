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
        $data = ProfilSekolah::first();
        // return $data;
        if($data)
        {
            return view('profil-sekolah.index', ['sekolah' => $data]);
        } else {
            return redirect()->route('sekolah.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProfilSekolah::first();
        if(empty($data)){
            return view('profil-sekolah.create');
        } else {
            return redirect()->route('sekolah.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            // 'npsn' => 'numeric',
            // 'alamat' => 'required',
            // 'selectedProvince' => 'required',
            // 'selectedCity' => 'required',
            // 'selectedDistrict' => 'required',
            // 'selectedVillage' => 'required',
            // 'kodepos' => 'numeric|min:5|max:5',
            // 'telp' => 'numeric',
            // 'email' => 'email:rfc,dns',
            // 'website' => 'url'
        ]);

        $sekolah = ProfilSekolah::create(
            $request->all()
        //     [
        //     'nama' => $request->nama,
        //     'npsn' => $request->npsn,
        //     'alamat' => $request->alamat,
        //     'provinsi' => $request->selectedProvince,
        //     'kota' => $request->selectedCity,
        //     'kecamatan' => $request->selectedDistrict,
        //     'kelurahan' => $request->selectedVillage,
        //     'kodepos' => $request->kodepos,
        //     'telp' => $request->telp,
        //     'email' => $request->email,
        //     'website' => $request->website,
        // ]
    );

        dd($sekolah);
        return redirect()->route('sekolah.index');
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
