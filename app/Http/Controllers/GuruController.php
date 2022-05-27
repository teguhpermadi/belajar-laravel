<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlamatUserRequest;
use App\Http\Requests\GuruRequest;
use App\Http\Requests\IdentitasUserRequest;
use App\Models\AlamatUser;
use App\Models\IdentitasUser;
use App\Models\User;
use Illuminate\Http\Request;

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
    $query = User::where('is_active', '1')->role('guru')->with('identitasUser')->get();
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
        $data = User::with('IdentitasUser', 'alamatUser.provinsi', 'alamatUser.kota', 'alamatUser.kecamatan', 'alamatUser.kelurahan', 'NomorIdentitasUser')->where('id', $id)->firstOrFail();
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
        return $validated;
        // IdentitasUser::where('id', $id)->update($validated);
        // AlamatUser::where('user_id', $id)->update($validated);
        // to_route('guru.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Guru::where('user_id',$id)->delete();
        return redirect()->route('guru.index');
    }
}
