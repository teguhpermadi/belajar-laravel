<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-adminlte-select label="Provinsi" wire:model="selectedProvince" name="provinsi_id">
        <x-adminlte-options :options="$provinces" empty-option="Pilih Provinsi"/>
    </x-adminlte-select>

    <x-adminlte-select label="Kota/Kabupaten" wire:model="selectedCity" name="kota_id">
        <x-adminlte-options :options="$cities" empty-option="Pilih Kota/Kabupaten"/>
    </x-adminlte-select>

    <x-adminlte-select label="Kecamatan" wire:model="selectedDistrict" name="kecamatan_id">
        <x-adminlte-options :options="$districts" empty-option="Pilih Kecamatan"/>
    </x-adminlte-select>

    <x-adminlte-select label="Kelurahan" wire:model="selectedVillage" name="kelurahan_id">
        <x-adminlte-options :options="$villages" empty-option="Pilih Kelurahan"/>
    </x-adminlte-select>
</div>