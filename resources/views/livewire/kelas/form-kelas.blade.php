<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <form action="">
        {{-- With label, invalid feedback disabled and form group class --}}
        <div class="row">
            <x-adminlte-input name="kelas" label="Nama Kelas" placeholder="Nama Kelas" fgroup-class="col-md-6" wire:model="nama"/>
            <x-adminlte-select label="Level" name="selectedLevel" fgroup-class="col-md-6" wire:model="selectedLevel">
                <x-adminlte-options empty-option="Pilih Level" :options="$level" />
            </x-adminlte-select>
        </div>
    </form>
    <x-adminlte-button class="btn" type="submit" label="Simpan" theme="success" icon="fas fa-lg fa-save" wire:click.prevent="store()"/>
</div>