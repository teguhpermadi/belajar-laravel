@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{ Breadcrumbs::render('guru') }}
@stop

    @section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Data guru">
                {{-- Setup data for datatables --}}
                @php
                    $heads = [
                    'Nama',
                    'Jenis Kelamin',
                    'Kontak',
                    ['label' => 'Actions', 'no-export' => true, 'width' => 15],
                    ];

                    $config = ['order' => [[1, 'asc']],
                    'columns' => [null, null, null, ['orderable' => false]],
                    ];
                @endphp

                <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" :config="$config"
                striped hoverable bordered compressed>
                   @foreach ($teachers as $teacher)
                   <tr>
                       <td>
                            @if ($teacher->identitas->avatar != null)
                            <img src="{{ asset('storage/uploads/avatars/' . $teacher->identitas->avatar) }}"
                                class="identitas-image img-circle elevation-2 mr-3" alt="{{ $teacher->identitas->fullname }}" height="30">
                            @else
                            <img src="{{ Avatar::create($teacher->identitas->fullname)->toBase64() }}" class="identitas-image img-circle elevation-2 mr-3"
                                alt="{{ $teacher->identitas->fullname }}" height="30">
                            @endif   
                        {{ Str::upper($teacher->identitas->fullname )}}</td>
                       <td>{{ Str::ucfirst($teacher->jenis_kelamin) }}</td>
                       <td>{{ $teacher->identitas->phone }}</td>
                       <td>
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            <a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="{{ route('guru.show', $teacher->id) }}">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                            <form action="{{ route('guru.destroy', $teacher->id) }}" method="POST">
                                @method('delete')
                                @csrf()
                                <input type="hidden" name="id" value="{{ $teacher->id }}">
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