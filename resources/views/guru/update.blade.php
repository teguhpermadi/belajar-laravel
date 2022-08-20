@extends('adminlte::page')

@section('title', 'Profil Sekolah')
@section('plugins.Select2', true)

@section('content_header')
    {{-- <h1>Data guru {{ $data->user->name }}</h1> --}}
    {{ Breadcrumbs::render('show.guru', $data) }}
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
        <div class="col-12">
            <x-adminlte-card title="Identitas Diri" theme="primary" theme-mode="outline" collapsible>
                <x-adminlte-input label="Nama Lengkap" name="fullname"
                    value="{{ Str::title($data->fullname) }}" />
                <x-adminlte-input label="Nama Panggilan" name="nickname"
                    value="{{ Str::title($data->nickname) }}" />

                <x-adminlte-select label="Jenis Kelamin" name="jenis_kelamin">
                    <option value="">Pilih</option>
                    <option value="l" @if ($data->jenis_kelamin == 'l') selected @endif>Laki-laki</option>
                    <option value="p" @if ($data->jenis_kelamin == 'p') selected @endif>Perempuan</option>
                </x-adminlte-select>

                {{-- <x-adminlte-input label="Tempat Lahir" name="tempat_lahir"
                    value="{{ Str::title($data->tempat_lahir) }}" /> --}}
                @livewire('tempat-lahir.edit-tempat-lahir', ['selectedCity' => $data->tempat_lahir])

                <div class="row">
                    @php
                    $config = ['format' => 'YYYY-MM-DD'];
                    @endphp
                    <x-adminlte-input-date name="tanggal_lahir" label="Tanggal Lahir" :config="$config"  fgroup-class="col-md-12" value="{{ $data->tanggal_lahir }}"/>
                    @error('tanggal_lahir')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </x-adminlte-card>

            {{-- <x-adminlte-card title="Nomor Identitas" theme="primary" theme-mode="outline" collapsible>
                <x-adminlte-input label="Nomor Induk Kependudukan" name="nik"
                    value="{{ Str::title($data->nomornik) }}" />
                <x-adminlte-input label="Nomor Induk Pegawai" name="nip"
                    value="{{ Str::title($data->nomornip) }}" />
                <x-adminlte-input label="Nomor Induk Yayasan" name="niy"
                    value="{{ Str::title($data->nomorniy) }}" />
            </x-adminlte-card> --}}

            <x-adminlte-card title="Tempat Tinggal" theme="primary" theme-mode="outline" collapsible>
                <x-adminlte-input label="Alamat" name="alamat"
                    value="{{ Str::title($data->alamat) }}" />
                <x-adminlte-input label="Kodepos" name="kodepos"
                    value="{{ ($data->kodepos) }}" />
                    
                @livewire('alamat.edit-alamat', ['selectedVillage'=> $data->kelurahan_id])
                {{-- <x-adminlte-input label="Lattitude" name="lat"
                    value="{{ Str::title($data->lat) }}" />
                <x-adminlte-input label="Longtitude" name="long"
                    value="{{ Str::title($data->long) }}" /> --}}
            </x-adminlte-card>
        </div>
    </div>

    <div class="row mt-3 ml-1">
        <button type="submit" class="btn btn-primary">simpan</button>
    </div>
</form>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
