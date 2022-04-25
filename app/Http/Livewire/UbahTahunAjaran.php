<?php

namespace App\Http\Livewire;

use App\Models\Tahun;
use Livewire\Component;

class UbahTahunAjaran extends Component
{
    // public $id, $tahun, $semester;
    public $tahunajaran, $selectedState;

    public function mount()
    {
        $this->tahunajaran = Tahun::select('id', 'tahun')->orderBy('id', 'desc')->get();

        if(session()->has('tahun_id')){
            $this->selectedState = session()->get('tahun_id');
        }

    }

    public function render()
    {
        return view('livewire.ubah-tahun-ajaran');
    }

    public function updatedSelectedState($state)
    {
        $value = session()->put('tahun_id',$state);
        return $value;
    }
}
