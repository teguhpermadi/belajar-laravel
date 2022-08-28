@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{-- <h1>Data Siswa {{ $data->name }}</h1> --}}
{{ Breadcrumbs::render('show.siswa', $data) }}
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
                    <td>@livewire('tempat-lahir.show-tempat-lahir', ['city' => $data->tempat_lahir])</td>
                    {{-- <td>{{ Str::title($data->tempat_lahir) }}</td> --}}
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

        <div class="row mt-3 ml-1">
            <a class="btn btn-warning" title="Edit" href="{{ route('siswa.edit', $data->id) }}">
                Edit
            </a>
        </div>

        {{-- <x-adminlte-card title="Data Ayah" theme="primary" theme-mode="outline" collapsible>
            <table class="table table-striped">
                <tr>
                    <td>NIK</td>
                    <td>{{ $data->nomornik }}</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>{{ $data->nomornisn }}</td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>{{ $data->nomornis }}</td> 
                </tr>
            </table>
        </x-adminlte-card> --}}
        
        {{-- <x-adminlte-card title="Data Ayah" theme="primary" theme-mode="outline" collapsible>
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
        </x-adminlte-card> --}}
        {{-- <x-adminlte-card title="Data Ibu" theme="primary" theme-mode="outline" collapsible>
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
        </x-adminlte-card> --}}

        {{-- @if ($data->orangTuaUser->nama_wali || $data->orangTuaUser->pekerjaan_wali || $data->orangTuaUser->penghasilan_wali)
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
        @endif --}}
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