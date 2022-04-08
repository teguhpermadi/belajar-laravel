@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
<h1>Data Siswa  {{ $siswa->user->name }}</h1>
@stop

    @section('content')
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Identitas Diri">
                <dl class="row">
                    <dt class="col-sm-4">Nama Lengkap</dt>
                    <dd class="col-sm-8">{{ $siswa->user->name }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Nama Panggilan</dt>
                    <dd class="col-sm-8">tes</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Jenis Kelamin</dt>
                    <dd class="col-sm-8">{{ $siswa->jenis_kelamin }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">NISN</dt>
                    <dd class="col-sm-8">{{ $siswa->nisn }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">NIS</dt>
                    <dd class="col-sm-8">{{ $siswa->nis }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">NIK</dt>
                    <dd class="col-sm-8">{{ $siswa->nik }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">NKK</dt>
                    <dd class="col-sm-8">{{ $siswa->nkk }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Tempat Lahir</dt>
                    <dd class="col-sm-8">{{ $siswa->tempat_lahir }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Tanggal Lahir</dt>
                    <dd class="col-sm-8">{{ $siswa->tanggal_lahir }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Alamat</dt>
                    <dd class="col-sm-8">{{ $siswa->alamat }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Kelurahan</dt>
                    <dd class="col-sm-8">{{ $siswa->kelurahan->name }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Kecamatan</dt>
                    <dd class="col-sm-8">{{ $siswa->kecamatan->name }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Kota/Kabupaten</dt>
                    <dd class="col-sm-8">{{ $siswa->kota->name }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Provinsi</dt>
                    <dd class="col-sm-8">{{ $siswa->provinsi->name }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Kontak</dt>
                    <dd class="col-sm-8">{{ $siswa->user->phone }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ $siswa->user->email }}</dd>
                </dl>
                
                <dl class="row">
                    <dt class="col-sm-4"></dt>
                    <dd class="col-sm-8"></dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4"></dt>
                    <dd class="col-sm-8"></dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-4"></dt>
                    <dd class="col-sm-8"></dd>
                </dl>
            </x-adminlte-card>
            <x-adminlte-card title="Data Ayah">
            </x-adminlte-card>
            <x-adminlte-card title="Data Ibu">
            </x-adminlte-card>
            <x-adminlte-card title="Data Wali">
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