<?php

namespace App\Http\Livewire\Alamat;

use Livewire\Component;

class EditAlamat extends Component
{
    public $provinces, $cities, $districts, $villages;

    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedVillage = null;

    public function mount($selectedVillage = null)
    {
        $provinces = \Indonesia::allProvinces();

        foreach ($provinces as $province) {
            $this->provinces[$province->id] = $province->name;
        }

        if(!is_null($selectedVillage))
        {
            $village = \Indonesia::findVillage($selectedVillage, ['district.city.province']);
            
            if($village)
            {
                // pilih provinsi
                $this->selectedProvince = $village->district->city->province->id;

                // tampilkan kota berdasarkan provinsi
                $cities = \Indonesia::findProvince($village->district->city->province->id, ['cities']);
                foreach ($cities->cities as $city) {
                    $this->cities[$city->id] = $city->name;
                }

                // pilih kota
                $this->selectedCity = $village->district->city->id;

                // tampilkan kecamatan
                $districts = \Indonesia::findCity($village->district->city->id, ['districts']);
                foreach ($districts->districts as $district) {
                    $this->districts[$district->id] = $district->name;
                }

                $this->selectedDistrict = $village->district->id;

                // tampilkan kelurahan
                $villages = \Indonesia::findDistrict($village->district->id, ['villages']);
                foreach ($villages->villages as $village) {
                    $this->villages[$village->id] = $village->name;
                }

                // pilih kelurahan
                $this->selectedVillage = $village->id;                
            }
        }
        
    }

    public function render()
    {
        return view('livewire.alamat.edit-alamat');
    }

    public function updatedSelectedProvince($province)
    {
        // dd($province);
        $this->cities = null;
        $this->districts = null; 
        $this->villages = null;
        
        $cities = \Indonesia::findProvince($province, ['cities']);
        // dd($cities);
        foreach ($cities->cities as $city) {
            $this->cities[$city->id] = $city->name;
        }

    }


    public function updatedSelectedCity($city)
    {
        $this->districts = null; 
        $this->villages = null;

        $districts = \Indonesia::findCity($city, ['districts']);
        foreach ($districts->districts as $district) {
            $this->districts[$district->id] = $district->name;
        }
    }

    public function updatedSelectedDistrict($district)
    {
        $this->villages = null;

        $villages = \Indonesia::findDistrict($district, ['villages']);
        foreach ($villages->villages as $village) {
            $this->villages[$village->id] = $village->name;
        }
    }

    // public function updatedSelectedVillage($village)
    // {
    //     $village = \Indonesia::findVillage($village, $with = null);
    //     dd($village);
    // }
}
