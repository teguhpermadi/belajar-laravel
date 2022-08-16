<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.index');
    }

    public function anyData()
    {
        $query = User::where('is_active', '1')->role('pd')->get();

        return datatables()->of($query)
            ->addColumn('link', '<a href="#">Html Column</a>')
            ->addColumn('action', 'siswa.action-datatables')
            ->addColumn('avatar', 'siswa.avatar-datatables')
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
        $data = User::with('IdentitasUser', 'alamatUser.provinsi', 'alamatUser.kota', 'alamatUser.kecamatan', 'alamatUser.kelurahan', 'NomorIdentitasUser', 'OrangTuaUser')->where('id', $id)->firstOrFail();
        // return ($data);
        return view('siswa.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::where('user_id',$id)->delete();
        return redirect()->route('siswa.index');
    }
}
