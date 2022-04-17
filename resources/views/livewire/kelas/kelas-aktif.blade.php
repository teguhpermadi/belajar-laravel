<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @php
$config = [
    'onColor' => 'green',
    'offColor' => 'dark',
    'inverse' => true,
    'onText' => 'Aktif',
    'offText' => 'Tidak',
    'state' => $status,
    'labelText' => '<i class="fas fa-fw fa-lightbulb text-green"></i>',
];
@endphp
    <x-adminlte-input-switch name="{{ $name }}" igroup-size="sm" checked :config="$config"/>
</div>