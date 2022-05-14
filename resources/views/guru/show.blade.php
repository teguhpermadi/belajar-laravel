@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{-- <h1>Data guru {{ $data->user->name }}</h1> --}}
{{ Breadcrumbs::render('show.guru', $data->identitasUser) }}
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Identitas Diri" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td style="width:50%">Nama Lengkap</td>
                    <td>{{ Str::title($data->identitasUser->fullname) }}</td>
                </tr>
                <tr>
                    <td>Nama Panggilan</td>
                    <td>{{ Str::title($data->identitasUser->nickname) }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ Str::title($data->identitasUser->jenis_kelamin) }}</td>
                </tr>
                
                <tr>
                    <td>Tempat Lahir</td>
                    <td>{{ Str::title($data->identitasUser->tempat_lahir) }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $data->identitasUser->tanggal_lahir }}</td>
                </tr>
                
                <tr>
                    <td>Email</td>
                    <td>{{ Str::lower($data->email) }}</td>
                </tr>
            </table>
        </x-adminlte-card>

        <x-adminlte-card title="Nomor Identitas" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td>NIK</td>
                    <td>{{ $data->nomorIdentitasUser->nik }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>{{ $data->nomorIdentitasUser->nip }}</td>
                </tr>
                <tr>
                    <td>NIY</td>
                    <td>{{ $data->nomorIdentitasUser->niy }}</td>
                </tr>
            </table>
        </x-adminlte-card>

        <x-adminlte-card title="Tempat Tinggal" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td>Alamat</td>
                    <td>{{ $data->alamatUser->alamat }}</td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>{{ $data->alamatUser->kelurahan->name }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>{{ $data->alamatUser->kecamatan->name }}</td>
                </tr>
                <tr>
                    <td>Kota/Kabupaten</td>
                    <td>{{ $data->alamatUser->kota->name }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $data->alamatUser->provinsi->name }}</td>
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