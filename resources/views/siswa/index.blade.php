@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{ Breadcrumbs::render('siswa') }}
@stop

    @section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Data Siswa">
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
                   @foreach ($students as $student)
                   <tr>
                       <td>
                            @if ($student->user->avatar != null)
                            <img src="{{ asset('storage/uploads/avatars/' . $student->user->avatar) }}"
                                class="user-image img-circle elevation-2 mr-3" alt="{{ $student->user->fullname }}" height="30">
                            @else
                            <img src="{{ Avatar::create($student->user->fullname)->toBase64() }}" class="user-image img-circle elevation-2 mr-3"
                                alt="{{ $student->user->fullname }}" height="30">
                            @endif   
                        {{ Str::upper($student->user->fullname )}}</td>
                       <td>{{ Str::ucfirst($student->jenis_kelamin) }}</td>
                       <td>{{ $student->user->phone }}</td>
                       <td>
                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            <a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="{{ route('siswa.show', $student->user_id) }}">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                            <form action="{{ route('siswa.destroy', $student->user_id) }}" method="POST">
                                @method('delete')
                                @csrf()
                                <input type="hidden" name="id" value="{{ $student->user_id }}">
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