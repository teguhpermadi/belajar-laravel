<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kelas.index');
    }
    
    public function anyData()
    {
        // $tahun_id = session()->get('tahun_id');
        $tahun_id = Tahun::all()->first()->id;
        $query = Kelas::withCount('rombel')->with('tahun', 'walikelas.identitasUser')->where('tahun_id', $tahun_id)->get();
        // return $query;
        return datatables()->of($query)
            ->addColumn('action', 'kelas.action-datatables')
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
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kelas::withCount('rombel')->with('rombel.siswa')->where('id', $id)->get();
        return $data;
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
        return $id;
    }
}
