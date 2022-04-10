@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
<h1>Data Siswa {{ $siswa->user->name }}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Identitas Diri" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td style="width:50%">Nama Lengkap</td>
                    <td>{{ $siswa->user->name }}</td>
                </tr>
                <tr>
                    <td>Nama Panggilan</td>
                    <td>tes</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>{{ $siswa->nisn }}</td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>{{ $siswa->nis }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>{{ $siswa->nik }}</td>
                </tr>
                <tr>
                    <td>NKK</td>
                    <td>{{ $siswa->nkk }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>{{ $siswa->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $siswa->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $siswa->alamat }}</td>
                </tr>
                <tr>
                    <td>Kelurahan</td>
                    <td>{{ $siswa->kelurahan->name }}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>{{ $siswa->kecamatan->name }}</td>
                </tr>
                <tr>
                    <td>Kota/Kabupaten</td>
                    <td>{{ $siswa->kota->name }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $siswa->provinsi->name }}</td>
                </tr>
                <tr>
                    <td>Kontak</td>
                    <td>{{ $siswa->user->phone }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $siswa->user->email }}</td>
                </tr>
            </table>
        </x-adminlte-card>
        <x-adminlte-card title="Data Ayah" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td  style="width:50%">Nama Ayah</td>
                    <td>{{ $siswa->nama_ayah }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $siswa->pekerjaan_ayah }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>{{ $siswa->penghasilan_ayah }}</td>
                </tr>
            </table>
        </x-adminlte-card>
        <x-adminlte-card title="Data Ibu" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td  style="width:50%">Nama Ibu</td>
                    <td>{{ $siswa->nama_ibu }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $siswa->pekerjaan_ibu }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>{{ $siswa->penghasilan_ibu }}</td>
                </tr>
            </table>
        </x-adminlte-card>
        @if ($siswa->nama_wali || $siswa->pekerjaan_wali || $siswa->penghasilan_wali)
        <x-adminlte-card title="Data Wali" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td  style="width:50%">Nama Wali</td>
                    <td>{{ $siswa->nama_wali }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $siswa->pekerjaan_wali }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>{{ $siswa->penghasilan_wali }}</td>
                </tr>
            </table>
        </x-adminlte-card>
        @endif
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