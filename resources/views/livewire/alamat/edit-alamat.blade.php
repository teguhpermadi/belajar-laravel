<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-adminlte-select2 label="Provinsi" wire:model="selectedProvince" name="provinsi_id">
        <x-adminlte-options :options="$provinces" empty-option="Pilih Provinsi"/>
    </x-adminlte-select2>

    <x-adminlte-select2 label="Kota/Kabupaten" wire:model="selectedCity" name="kota_id">
        <x-adminlte-options :options="$cities" empty-option="Pilih Kota/Kabupaten"/>
    </x-adminlte-select2>

    <x-adminlte-select2 label="Kecamatan" wire:model="selectedDistrict" name="kecamatan_id">
        <x-adminlte-options :options="$districts" empty-option="Pilih Kecamatan"/>
    </x-adminlte-select2>

    <x-adminlte-select2 label="Kelurahan" wire:model="selectedVillage" name="kelurahan_id">
        <x-adminlte-options :options="$villages" empty-option="Pilih Kelurahan"/>
    </x-adminlte-select2>
</div>