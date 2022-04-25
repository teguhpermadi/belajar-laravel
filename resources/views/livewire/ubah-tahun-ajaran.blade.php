<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <select wire:model="selectedState" class="form-control" required>
        <option value="" selected>Choose state</option>
        @foreach($tahunajaran as $tahun)
            <option value="{{ $tahun->id }}">{{ $tahun->tahun }}</option>
        @endforeach
    </select>
</div>
