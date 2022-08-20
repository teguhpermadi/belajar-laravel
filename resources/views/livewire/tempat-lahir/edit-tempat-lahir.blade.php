<div>
    {{-- In work, do what you enjoy. --}}
    @php
        $config = [
            'liveSearch' => true,
            'liveSearchPlaceholder' => 'Search...',
        ];
    @endphp
    <x-adminlte-select2 wire:model="selectedCity" name="tempat_lahir" label="Tempat Lahir"
        :config="$config">
        <x-adminlte-options :options="$cities" />
    </x-adminlte-select2>
</div>
