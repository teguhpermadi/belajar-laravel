<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $tahun = session()->get('tahun_id');
        // $tahun_id = Tahun::all()->first()->id;
        $query = Kelas::withCount('rombel')->with('tahun', 'walikelas')->where('tahun_id', $tahun)->get();
        // return $query;
        return datatables()->of($query)
            ->addColumn('kelas', 'kelas.avatar-datatables')
            ->addColumn('action', 'kelas.action-datatables')
            ->rawColumns(['action', 'kelas'])
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
        $tahun = [];
        $guru = [];
        $session = session()->get('tahun_id');
        $data_guru = User::select('id', 'fullname')->where('is_active', '1')->role('ptk')->get();
        $data_tahun = Tahun::all();
        $tahun_now = Tahun::where('id', $session)->first();
        // return $tahun_now;

        foreach ($data_guru as $key) {
            $guru[$key->id] = $key->fullname;
        }

        foreach ($data_tahun as $key) {
            $tahun[$key->id] = $key->tahun;
        }
        
        switch (env('JENJANG_SEKOLAH')) {
            case 'sma':
                $optionsLevel = ['10' => '10', '11' => '11', '12' => '12'];
                break;
            case 'smp':
                $optionsLevel = ['7' => '7', '8' => '8', '9' => '9'];
                break;
            case 'sd':
                $optionsLevel = ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'];
                break;
            case 'tk':
                $optionsLevel = ['a' => 'a', 'b' => 'b'];
                break;
        };

        return view('kelas.create', 
        [
            'optionsLevel' => $optionsLevel, 
            'guru' => $guru, 'tahun' => $tahun, 
            'tahun_now' => $tahun_now,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelasRequest $request)
    {
        // dd($request);
        $validated = $request->validated();
        // return $validated;
        Kelas::create($validated);
        flash()->success('Data berhasil disimpan');
        return redirect('kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::withCount('rombel')->with(['walikelas'])->where('id', $id)->firstOrFail();
        $laki = User::with('rombel')->where('jenis_kelamin', 'l')->whereRelation('rombel', 'kelas_id', $id)->get()->count();
        $perempuan = User::with('rombel')->where('jenis_kelamin', 'p')->whereRelation('rombel', 'kelas_id', $id)->get()->count();

        // return $kelas;
        // return $laki;
        // return $perempuan;

        return view('kelas.show', ['data' => $kelas, 'laki' => $laki, 'perempuan' => $perempuan]);
    }

    public function siswa_rombel($id)
    {
        $query = Rombel::with('user')->where('kelas_id', $id)->get();
        // return($query);
        // return datatables()->of($query)
        //     ->addColumn('action', 'kelas.action-datatables')
        //     ->rawColumns(['action'])
        //     ->addIndexColumn()
        //     ->toJson();
        return datatables()->of($query)
            ->editColumn('kelamin', function($query){
                switch ($query->user->jenis_kelamin) {
                    case 'l':
                        return 'Laki-laki';
                        break;
                    case 'p':
                        return 'Perempuan';
                        break;
                }
            })
            ->editColumn('email', function($query){
                return $query->user->email;
            })
            ->addColumn('action', 'kelas.siswa.action-datatables')
            ->addColumn('avatar', 'kelas.siswa.avatar-datatables')
            ->rawColumns(['link', 'action', 'avatar', 'email'])
            ->addIndexColumn()
            ->toJson();
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
