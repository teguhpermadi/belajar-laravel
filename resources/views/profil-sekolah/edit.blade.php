@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
    {{-- <h1>Profil Sekolah</h1> --}}
    {{ Breadcrumbs::render('edit sekolah', $sekolah) }}
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Data Sekolah">
                <form action="{{ route('sekolah.update', $sekolah->id) }}" method="post">
                    @method('put')
                    @csrf
                    <x-adminlte-input name="nama" label="Nama Sekolah" placeholder="nama sekolah"
                        value="{{ $sekolah->nama }}" />
                    <x-adminlte-input name="npsn" label="NPSN" placeholder="npsn" value="{{ $sekolah->npsn }}" />
                    <x-adminlte-input name="alamat" label="alamat" placeholder="alamat" value="{{ $sekolah->alamat }}" />
                    
                    @livewire('alamat.edit-alamat', ['selectedVillage' => $sekolah->kelurahan])

                    <x-adminlte-input name="kodepos" label="kodepos" placeholder="kodepos"
                        value="{{ $sekolah->kodepos }}" />
                    <x-adminlte-input name="telp" label="telp" placeholder="telp" value="{{ $sekolah->telp }}" />
                    <x-adminlte-input name="email" label="email" placeholder="email" value="{{ $sekolah->email }}" />
                    <x-adminlte-input name="website" label="website" placeholder="website"
                        value="{{ $sekolah->website }}" />
                    <a href="{{ route('sekolah.index') }}" class="btn btn-secondary">Batal</a>
                    <x-adminlte-button class="ml-3" type="submit" label="Simpan" theme="primary" />
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
