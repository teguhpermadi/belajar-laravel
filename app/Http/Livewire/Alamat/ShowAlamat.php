<?php

namespace App\Http\Livewire\Alamat;

use Livewire\Component;

class ShowAlamat extends Component
{
    public $data, $provinsi, $kota, $kecamatan, $kelurahan;

    public function mount($village = null)
    {
        $this->provinsi = '-';
        $this->kota = '-';
        $this->kecamatan = '-';
        $this->kelurahan = '-';

        if(!is_null($village))
        {
            $data = \Indonesia::findVillage($village, ['district.city.province']);
            // dd($data);
            $this->provinsi = $data->district->city->province->name;
            $this->kota = $data->district->city->name;
            $this->kecamatan = $data->district->name;
            $this->kelurahan = $data->name;
        }
    }
    public function render()
    {
        return view('livewire.alamat.show-alamat');
    }
}
