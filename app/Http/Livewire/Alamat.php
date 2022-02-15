<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alamat extends Component
{
    public $options_provinces = []; 
    public $options_cities = [];
    public $options_kecamatan = [];
    public $options_kelurahan = [];
    public $selected_province, $selected_city, $selected_kecamatan, $selected_kelurahan;
    public $provinceId = null;
    public $cityId = null;
    public $districtId = null;
    public $villageId = null;

    public function mount($provinsi = null, $kota = null, $kecamatan = null, $kelurahan = null)
    {
        $provinces = \Indonesia::allProvinces();
        
        foreach ($provinces as $province) {
            $this->options_provinces[$province->id] = $province->name;
        }

        if(($provinsi)){
            $this->selected_province = $provinsi;
        }
        
        $this->cities = collect();

    }

    public function render()
    {
        return view('livewire.alamat');
    }
    
    public function updatedProvinceId($province_id)
    {
        $this->options_cities = [];
        $this->options_kecamatan = [];
        $this->options_kelurahan = [];

        if(!is_null($province_id)){
            $cities = \Indonesia::findProvince($province_id, ['cities']);
            // dd($cities);
            foreach ($cities->cities as $city) {
                $this->options_cities[$city->id] = $city->name;
            }
        }
    }

    public function updatedCityId($city_id)
    {
        $this->options_kecamatan = [];
        $this->options_kelurahan = [];

        if(!is_null($city_id))
        {
            $districts = \Indonesia::findCity($city_id, 'districts');
            // dd($districts);
            foreach ($districts->districts as $district) {
                $this->options_kecamatan[$district->id] = $district->name;
            }
        }
    }

    public function updatedDistrictId($districtId)
    {
        $this->options_kelurahan = [];
        if(!is_null($districtId))
        {
            $villages = \Indonesia::findDistrict($districtId, ['villages']);
            foreach ($villages->villages as $village) {
                $this->options_kelurahan[$village->id] = $village->name;
            }
        }
    }
}
