<div>
    <x-adminlte-select name="provinsi" label="Provinsi" wire:model="provinceId">
        <x-adminlte-options :options="$options_provinces" empty-option="pilih provinsi" :selected="$selected_province" />
    </x-adminlte-select>

    <x-adminlte-select name="kota" label="Kota" wire:model="cityId">
        <x-adminlte-options :options="$options_cities" empty-option="pilih kota" :selected="$selected_city" />
    </x-adminlte-select>

    <x-adminlte-select name="kecamatan" label="Kecamatan" wire:model="districtId">
        <x-adminlte-options :options="$options_kecamatan" empty-option="pilih kecamatan" :selected="$selected_kecamatan" />
    </x-adminlte-select>

    <x-adminlte-select name="kelurahan" label="Kelurahan" wire:model="villageId">
        <x-adminlte-options :options="$options_kelurahan" empty-option="pilih kelurahan" :selected="$selected_kelurahan" />
    </x-adminlte-select>
</div>