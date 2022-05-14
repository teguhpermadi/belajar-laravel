@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{-- <h1>Data Siswa {{ $data->identitasUser->name }}</h1> --}}
{{ Breadcrumbs::render('show.siswa', $data->identitasUser) }}
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

        <x-adminlte-card title="Data Ayah" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td>NIK</td>
                    <td>{{ $data->nomorIdentitasUser->nik }}</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>{{ $data->nomorIdentitasUser->nisn }}</td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>{{ $data->nomorIdentitasUser->nis }}</td> 
                </tr>
            </table>
        </x-adminlte-card>
        
        <x-adminlte-card title="Data Ayah" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td  style="width:50%">Nama Ayah</td>
                    <td>{{ $data->orangTuaUser->nama_ayah }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $data->orangTuaUser->pekerjaan_ayah }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>{{ $data->orangTuaUser->penghasilan_ayah }}</td>
                </tr>
            </table>
        </x-adminlte-card>
        <x-adminlte-card title="Data Ibu" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td  style="width:50%">Nama Ibu</td>
                    <td>{{ $data->orangTuaUser->nama_ibu }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $data->orangTuaUser->pekerjaan_ibu }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>{{ $data->orangTuaUser->penghasilan_ibu }}</td>
                </tr>
            </table>
        </x-adminlte-card>
        @if ($data->orangTuaUser->nama_wali || $data->orangTuaUser->pekerjaan_wali || $data->orangTuaUser->penghasilan_wali)
        <x-adminlte-card title="Data Wali" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td  style="width:50%">Nama Wali</td>
                    <td>{{ $data->orangTuaUser->nama_wali }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>{{ $data->orangTuaUser->pekerjaan_wali }}</td>
                </tr>
                <tr>
                    <td>Penghasilan</td>
                    <td>{{ $data->orangTuaUser->penghasilan_wali }}</td>
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