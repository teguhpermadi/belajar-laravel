<?php

namespace App\Http\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\User;
use Illuminate\Support\Arr;
use Livewire\Component;

class EditRombel extends Component
{
    public $siswa, $selectedSiswa;

    public function mount($kelas_id)
    {
        // $siswa = User::select('id', 'fullname')->where('is_active', '1')->role('pd')->get();
        $selectedSiswa = User::select('id')->whereRelation('rombel', 'kelas_id', $kelas_id)->get();
        
        $query = Rombel::with('user')->where('kelas_id', $kelas_id)->get();

        // ambil semua rombel yg memiliki tahun id
        $rombels = Rombel::whereHas('kelas', function ($query) {
            $tahun = session()->get('tahun_id');
            $query->where('tahun_id', $tahun);
        })->get();
        
        $user_all = [];
        foreach ($rombels as $kelas) {
            if($kelas->kelas_id != $kelas_id){
                $user_all[] = $kelas->user_id;
            }
        }

        $siswa = User::select('id', 'fullname')->whereNotIn('id', $user_all)->where('is_active', '1')->role('pd')->get();
        // dump($siswa);
        
        foreach ($siswa as $s) {
            $this->siswa[$s->id] = $s->fullname;
        }

        $this->selectedSiswa = $selectedSiswa->pluck("id");
    }

    public function render()
    {
        return view('livewire.kelas.edit-rombel');
    }

    
}
