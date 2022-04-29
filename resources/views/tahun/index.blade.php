@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{ Breadcrumbs::render('tahun') }}
@stop

    @section('content')
    
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Data Tahun Pelajaran">
                @php
                    $heads = [
                    'Tahun',
                    'Semester',
                    'Tanggal Awal',
                    'Tanggal Akhir',
                    'Kepala Sekolah',
                    ['label' => 'Actions', 'no-export' => true, 'width' => 15],
                    ];

                    $config = ['order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                    ];
                @endphp

                <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config"
                striped hoverable bordered compressed>
                   @foreach ($data as $tahun)
                   <tr>
                       <td>{{ $tahun->tahun }}</td>
                       <td>{{ $tahun->semester }}</td>
                       <td>{{ $tahun->tanggal_awal }}</td>
                       <td>{{ $tahun->tanggal_akhir }}</td>
                       <td>{{ $tahun->kepalasekolah->identitas->fullname }}</td>
                       <td>
                        <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>
                        <a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="{{ route('tahun.show', $tahun->id) }}">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
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