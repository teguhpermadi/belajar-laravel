@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
    <h1>Kelas</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <form action="{{ route('kelas.store') }}" method="post">
                <x-adminlte-card title="Kelas" theme-mode="outline">
                    @csrf

                    {{-- <x-adminlte-select name="tahun_id" label="Tahun Ajaran">
                        <x-adminlte-options :options="$tahun" empty-option="Pilih tahun ajaran" />
                    </x-adminlte-select> --}}

                    <x-adminlte-input name="tahun" label="Tahun Ajaran" value="{{ $tahun_now->tahun }}" readonly/>
                    <input type="hidden" name="tahun_id" value="{{ $tahun_now->id }}">
                    
                    <x-adminlte-input name="nama" label="Nama Kelas" placeholder="nama kelas" />

                    <x-adminlte-select name="user_id" label="Walikelas">
                        <x-adminlte-options :options="$guru" empty-option="Pilih wali kelas" />
                    </x-adminlte-select>

                    <x-adminlte-select name="level" label="Level">
                        <x-adminlte-options :options="$optionsLevel" empty-option="Pilih level kelas" />
                    </x-adminlte-select>

                    <x-slot name="footerSlot">
                        <x-adminlte-button type="submit" label="Simpan" theme="primary" />
                    </x-slot>
                </x-adminlte-card>
            </form>
        </div>
    </div>

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
