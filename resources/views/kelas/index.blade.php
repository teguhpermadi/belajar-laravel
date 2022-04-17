@extends('adminlte::page')
@section('plugins.BootstrapSwitch', true)
@section('title', 'Profil Sekolah')

@section('content_header')
{{ Breadcrumbs::render('kelas') }}
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Data Kelas">
            @php
            $heads = [
                ['label' => 'Nama Kelas'],
                ['label' => 'Level'],
                ['label' => 'Aktif'],
                ['label' => 'Actions', 'no-export' => true, 'width' => 15],
            ];

        
            $config = [
                'columns' => [null, null, null, ['orderable' => false]],
            ];        
            @endphp
        
            <x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config"
                striped hoverable bordered compressed>
                @foreach ($kelas as $k)
                    <tr>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->level }}</td>
                        <td>
                            @livewire('kelas.kelas-aktif', ['kelas_id' => $k->id, 'status' => $k->aktif])
                        </td>
                        <td>
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            <a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="{{ route('kelas.show', $k->id) }}">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                            <form action="{{ route('kelas.destroy', $k->id) }}" method="POST">
                                @method('delete')
                                @csrf()
                                <input type="hidden" name="id" value="{{ $k->id }}">
                                <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>                    
                @endforeach
            </x-adminlte-datatable>
        </x-adminlte-card>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
