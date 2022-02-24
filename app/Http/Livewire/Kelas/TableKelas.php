<?php

namespace App\Http\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class TableKelas extends Component
{
    public $kelas;
    protected $listeners = ['kelasAdded' => 'mount'];

    public function mount()
    {
        $this->kelas = Kelas::all();
    }
    
    public function render()
    {
        // dd($this->data);
        return view('livewire.kelas.table-kelas');
    }
}
