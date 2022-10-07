<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuruRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
        // $query = User::role('ptk')->get();
        $query = User::where('is_active', '1')->role('ptk')->get();
        // return $query;
        return datatables()->of($query)
            // ->addColumn('link', '<a href="">Html Column</a>')
            ->editColumn('kelamin', function($query){
                switch ($query->jenis_kelamin) {
                    case 'l':
                        return 'Laki-laki';
                        break;
                    case 'p':
                        return 'Perempuan';
                        break;
                }
            })
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
        return view('guru.edit', ['data' => $data]);
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
        User::where('id', $id)->update(Arr::except($validated, [
            'username',
            'email',
            'password'
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
