@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{-- <h1>Data guru {{ $data->user->name }}</h1> --}}
{{ Breadcrumbs::render('show.guru', $data) }}
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Identitas Diri" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td style="width:50%">Nama Lengkap</td>
                    <td>{{ Str::title($data->fullname) }}</td>
                </tr>
                <tr>
                    <td>Nama Panggilan</td>
                    <td>{{ Str::title($data->nickname) }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ Str::title($data->jenis_kelamin) }}</td>
                </tr>
                
                <tr>
                    <td>Tempat Lahir</td>
                    <td>{{ Str::title($data->tempat_lahir) }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                </tr>
                
                <tr>
                    <td>Email</td>
                    <td>{{ Str::lower($data->email) }}</td>
                </tr>
            </table>
        </x-adminlte-card>

        {{-- <x-adminlte-card title="Nomor Identitas" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td>NIK</td>
                    <td>{{ $data->nomornik }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>{{ $data->nomornip }}</td>
                </tr>
                <tr>
                    <td>NIY</td>
                    <td>{{ $data->nomorniy }}</td>
                </tr>
            </table>
        </x-adminlte-card> --}}

        <x-adminlte-card title="Tempat Tinggal" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td>Alamat</td>
                    <td>{{ $data->alamat }}</td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>{{ $data->village->name }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>{{ $data->village->district->name }}</td>
                </tr>
                <tr>
                    <td>Kota/Kabupaten</td>
                    <td>{{ $data->village->district->city->name }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $data->village->district->city->province->name }}</td>
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