<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowAlamat extends Component
{
    public $data;

    public function mount($village = null)
    {
        if(!is_null($village))
        {
            $data = \Indonesia::findVillage($village, ['district.city.province']);
            // dd($data);
            $this->data = $data;
        }
    }
    public function render()
    {
        return view('livewire.show-alamat');
    }
}
