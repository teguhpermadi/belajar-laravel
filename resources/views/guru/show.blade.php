@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{-- <h1>Data guru {{ $guru->user->name }}</h1> --}}
{{ Breadcrumbs::render('show guru', $guru->identitasUser) }}
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Identitas Diri" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td style="width:50%">Nama Lengkap</td>
                    <td>{{ Str::title($guru->identitasUser->fullname) }}</td>
                </tr>
                <tr>
                    <td>Nama Panggilan</td>
                    <td>{{ Str::title($guru->identitasUser->nickname) }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ Str::title($guru->identitasUser->jenis_kelamin) }}</td>
                </tr>
                
                <tr>
                    <td>Tempat Lahir</td>
                    <td>{{ Str::title($guru->identitasUser->tempat_lahir) }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $guru->identitasUser->tanggal_lahir }}</td>
                </tr>
                
                <tr>
                    <td>Email</td>
                    <td>{{ Str::lower($guru->email) }}</td>
                </tr>
            </table>
        </x-adminlte-card>

        <x-adminlte-card title="Nomor Identitas" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td>NIK</td>
                    <td>{{ $guru->nomorIdentitasUser->nik }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>{{ $guru->nomorIdentitasUser->nip }}</td>
                </tr>
                <tr>
                    <td>NIY</td>
                    <td>{{ $guru->nomorIdentitasUser->niy }}</td>
                </tr>
            </table>
        </x-adminlte-card>

        <x-adminlte-card title="Tempat Tinggal" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td>Alamat</td>
                    <td>{{ $guru->alamatUser->alamat }}</td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>{{ $guru->alamatUser->kelurahan->name }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>{{ $guru->alamatUser->kecamatan->name }}</td>
                </tr>
                <tr>
                    <td>Kota/Kabupaten</td>
                    <td>{{ $guru->alamatUser->kota->name }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $guru->alamatUser->provinsi->name }}</td>
                </tr>
            </table>
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