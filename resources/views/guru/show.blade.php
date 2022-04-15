@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{-- <h1>Data guru {{ $guru->user->name }}</h1> --}}
{{ Breadcrumbs::render('show guru', $guru->user) }}
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Identitas Diri" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td style="width:50%">Nama Lengkap</td>
                    <td>{{ $guru->user->fullname }}</td>
                </tr>
                <tr>
                    <td>Nama Panggilan</td>
                    <td>{{ $guru->user->nickname }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ $guru->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>{{ $guru->nik }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>{{ $guru->nip }}</td>
                </tr>
                <tr>
                    <td>NIY</td>
                    <td>{{ $guru->niy }}</td>
                </tr>
                <tr>
                    <td>Status Pegawai</td>
                    <td>{{ $guru->status_pegawai }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>{{ $guru->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $guru->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $guru->alamat }}</td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>{{ $guru->kelurahan->name }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>{{ $guru->kecamatan->name }}</td>
                </tr>
                <tr>
                    <td>Kota/Kabupaten</td>
                    <td>{{ $guru->kota->name }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $guru->provinsi->name }}</td>
                </tr>
                <tr>
                    <td>Kontak</td>
                    <td>{{ $guru->user->phone }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $guru->user->email }}</td>
                </tr>
            </table>
        </x-adminlte-card>
        {{-- <x-adminlte-card title="Data Ayah" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td  style="width:50%">Nama Ayah</td>
                    <td>{{ $guru->nama_ayah }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $guru->pekerjaan_ayah }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>{{ $guru->penghasilan_ayah }}</td>
                </tr>
            </table>
        </x-adminlte-card>
        <x-adminlte-card title="Data Ibu" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td  style="width:50%">Nama Ibu</td>
                    <td>{{ $guru->nama_ibu }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $guru->pekerjaan_ibu }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>{{ $guru->penghasilan_ibu }}</td>
                </tr>
            </table>
        </x-adminlte-card> --}}
        
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