<?php

namespace App\Http\Livewire\Kelas;

use Livewire\Component;

class KelasAktif extends Component
{
    public $name, $status;

    public function mount($kelas_id, $status)
    {
        $this->name = 'tg-btn-'.$kelas_id;
        switch ($status) {
            case '1':
                $this->status = true;
                break;
            
            default:
                $this->status = false;
                break;
        }
    }

    public function render()
    {
        return view('livewire.kelas.kelas-aktif');
    }
}
