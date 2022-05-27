@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
    {{-- <h1>Data guru {{ $data->user->name }}</h1> --}}
    {{ Breadcrumbs::render('show.guru', $data->identitasUser) }}
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
<form action="{{ route('guru.update', $data->id) }}" method="post">
    @method('put')
    @csrf
    <div class="row">
        <button type="submit" class="btn btn-primary">simpan</button>
    </div>
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Identitas Diri" theme="primary" theme-mode="outline" collapsible>
                <x-adminlte-input label="Nama Lengkap" name="fullname"
                    value="{{ Str::title($data->identitasUser->fullname) }}" />
                <x-adminlte-input label="Nama Panggilan" name="nickname"
                    value="{{ Str::title($data->identitasUser->nickname) }}" />

                <x-adminlte-select label="Jenis Kelamin" name="jenis_kelamin">
                    <option value="">Pilih</option>
                    <option value="l" @if ($data->identitasUser->jenis_kelamin == 'l') selected @endif>Laki-laki</option>
                    <option value="p" @if ($data->identitasUser->jenis_kelamin == 'p') selected @endif>Perempuan</option>
                </x-adminlte-select>

                <x-adminlte-input label="Tempat Lahir" name="tempat_lahir"
                    value="{{ Str::title($data->identitasUser->tempat_lahir) }}" />

                <div class="row">
                    @php
                    $config = ['format' => 'YYYY-MM-DD'];
                    @endphp
                    <x-adminlte-input-date name="tanggal_lahir" label="Tanggal Lahir" :config="$config"  fgroup-class="col-md-12" value="{{ $data->identitasUser->tanggal_lahir }}"/>
                    @error('tanggal_lahir')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </x-adminlte-card>

            <x-adminlte-card title="Nomor Identitas" theme="primary" theme-mode="outline" collapsible>
                <x-adminlte-input label="Nomor Induk Kependudukan" name="nik"
                    value="{{ Str::title($data->nomorIdentitasUser->nik) }}" />
                <x-adminlte-input label="Nomor Induk Pegawai" name="nip"
                    value="{{ Str::title($data->nomorIdentitasUser->nip) }}" />
                <x-adminlte-input label="Nomor Induk Yayasan" name="niy"
                    value="{{ Str::title($data->nomorIdentitasUser->niy) }}" />
            </x-adminlte-card>

            <x-adminlte-card title="Tempat Tinggal" theme="primary" theme-mode="outline" collapsible>
                <x-adminlte-input label="Alamat" name="alamat"
                    value="{{ Str::title($data->alamatUser->alamat) }}" />
                <x-adminlte-input label="Kodepos" name="kodepos"
                    value="{{ Str::title($data->alamatUser->kodepos) }}" />
                @livewire('alamat.edit-alamat', ['selectedVillage'=>'1'])
            </x-adminlte-card>
        </div>
    </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
