@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
<h1>Profil Sekolah</h1>
@stop

    @section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Data Sekolah">
                <form action="{{ route('sekolah.edit') }}" method="post">
                    @csrf
                    <x-adminlte-input name="nama" label="Nama Sekolah" placeholder="nama sekolah"
                        value="{{ $sekolah->nama }}" disabled />
                    <x-adminlte-input name="npsn" label="NPSN" placeholder="npsn" value="{{ $sekolah->npsn }}" disabled/>
                    <x-adminlte-input name="alamat" label="alamat" placeholder="alamat" value="{{ $sekolah->alamat }}"
                        disabled />

                    <x-adminlte-input name="kodepos" label="kodepos" placeholder="kodepos"
                        value="{{ $sekolah->kodepos }}" disabled />
                    <x-adminlte-input name="telp" label="telp" placeholder="telp" value="{{ $sekolah->telp }}"
                        disabled />
                    <x-adminlte-input name="email" label="email" placeholder="email" value="{{ $sekolah->email }}"
                        disabled />
                    <x-adminlte-input name="website" label="website" placeholder="website"
                        value="{{ $sekolah->website }}" disabled />
                    <x-adminlte-button type="submit" label="Edit" theme="warning" />
                </form>
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