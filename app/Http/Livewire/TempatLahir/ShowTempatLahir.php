<?php

namespace App\Http\Livewire\TempatLahir;

use Livewire\Component;

class ShowTempatLahir extends Component
{
    public $kota;

    public function mount($city = null)
    {
        $this->kota = '-';

        if(!is_null($city))
        {
            $data = \Indonesia::findCity($city, $with = null);
            // dd($data);
            $this->kota = $data->name;
        }
    }

    public function render()
    {
        return view('livewire.tempat-lahir.show-tempat-lahir');
    }
}
