<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuruRequest;
use App\Http\Requests\IdentitasUserRequest;
use App\Models\AlamatUser;
use App\Models\NomorIdentitasUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru.index');
    }

    public function anyData()
    {
        $query = User::where('is_active', '1')->role('ptk')->get();
        // return $query;
        return datatables()->of($query)
            ->addColumn('link', '<a href="#">Html Column</a>')
            ->addColumn('action', 'guru.action-datatables')
            ->addColumn('avatar', 'guru.avatar-datatables')
            ->rawColumns(['link', 'action', 'avatar'])
            ->addIndexColumn()
            ->toJson();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::with('tempat_lahir', 'village.district.city.province')->where('id', $id)->firstOrFail();
        // return ($data);
        return view('guru.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->firstOrFail();
        return view('guru.update', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuruRequest $request, $id)
    {
        $validated = $request->validated();
        // return $validated;
        User::where('id', $id)->update(Arr::only($validated, [
            'fullname',
            'nickname',
            'avatar',
            'phone',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'ttd'
        ]));
        
        AlamatUser::where('user_id', $id)->update(Arr::only($validated, [
            'alamat',
            'kodepos',
            'provinsi_id',
            'kota_id',
            'kecamatan_id',
            'kelurahan_id',
            'long',
            'lat',
        ]));
        
        NomorIdentitasUser::where('user_id', $id)->update(Arr::only($validated, [
            'nik',
            'nkk',
            'nip',
            'niy',
            'nuptk',
            'nisn',
            'nis',
        ]));

        flash()->warning('Data berhasil diubah');
        return to_route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Guru::where('user_id', $id)->delete();
        return redirect()->route('guru.index');
    }
}
