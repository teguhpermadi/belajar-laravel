@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
<h1>Profil Sekolah</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Data Sekolah">
            <form action="{{ route('sekolah.store') }}" method="post">
                @method('post')
                @csrf
                <x-adminlte-input name="nama" label="Nama Sekolah" placeholder="nama sekolah" />
                <x-adminlte-input name="npsn" label="NPSN" placeholder="npsn" />
                <x-adminlte-input name="alamat" label="alamat" placeholder="alamat" />

                @livewire('alamat.edit-alamat')

                <x-adminlte-input name="kodepos" label="kodepos" placeholder="kodepos" />
                <x-adminlte-input name="telp" label="telp" placeholder="telp" />
                <x-adminlte-input name="email" label="email" placeholder="email" />
                <x-adminlte-input name="website" label="website" placeholder="website" />
                <x-adminlte-button type="submit" label="Simpan" theme="primary" />
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