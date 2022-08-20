<?php

namespace App\Http\Livewire\TempatLahir;

use Livewire\Component;

class EditTempatLahir extends Component
{
    public $cities;

    public $selectedCity = null;
    
    public function mount($selectedCity = null)
    {
        $cities = \Indonesia::allCities();

        foreach ($cities as $city) {
            $this->cities[$city->id] = $city->name;
        }

    }

    public function render()
    {
        return view('livewire.tempat-lahir.edit-tempat-lahir');
    }
}
