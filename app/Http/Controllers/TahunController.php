<?php

namespace App\Http\Controllers;

use App\Http\Requests\TahunRequest;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Http\Request;
use Bilfeldt\LaravelFlashMessage\Message;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tahun.index');
    }

    public function anyData()
    {
        $query = Tahun::with('kepalaSekolah.identitasUser')->orderBy('created_at', 'desc')->get();
        return datatables()->of($query)
            ->addColumn('action', 'tahun.action-datatables')
            ->rawColumns(['action'])
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
        $users = User::role('guru')->with('identitasUser')->get();
        return view('tahun.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TahunRequest $request)
    {
        $validated = $request->validated();
        // return $validated;
        Tahun::create($validated);
        flash()->success('Data berhasil disimpan');
        return redirect('tahun');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tahun::with('kepalaSekolah.identitasUser')->where('id', $id)->firstOrFail();
        // return $data;
        return view('tahun.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::role('guru')->with('identitasUser')->get();
        $data = Tahun::with('kepalaSekolah.identitasUser')->where('id', $id)->firstOrFail();
        // return $data;
        return view('tahun.update', ['data' => $data, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TahunRequest $request, $id)
    {
        $validated = $request->validated();
        Tahun::where('id', $id)->update($validated);
        flash()->success('Data berhasil diubah');
        return to_route('tahun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
