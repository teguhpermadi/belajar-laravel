@extends('adminlte::page')

@section('title', 'Formulir Pendaftaran Peserta Didik Baru')

@section('content_header')
<h1>Formulir Pendaftaran Peserta Didik Baru</h1>
@stop

@section('content')
<x-adminlte-card title="Identitas Peserta Didik" theme-mode="full">
    <x-adminlte-input name="namalengkap" label="Nama Lengkap"/>
    <x-adminlte-select name="jeniskelamin" label="Jenis Kelamin">
        <option></option>
        <option value="l">Laki-laki</option>
        <option value="p">Perempuan</option>
    </x-adminlte-select>
    <x-adminlte-input name="aktalahir" label="Nomor Akta Lahir"/>
    <x-adminlte-input name="kartukeluarga" label="Nomor Kartu Keluarga"/>
    <x-adminlte-input name="nik" label="Nomor Induk Kependudukan"/>
    <x-adminlte-input name="nisn" label="Nomor Induk Siswa Nasional"/>
    <x-adminlte-input name="nis_asal" label="Nomor Induk Siswa di Sekolah Asal"/>
    <x-adminlte-input name="tempatlahir" label="Nomor Induk Siswa di Sekolah Asal"/>
</x-adminlte-card>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');

</script>
@stop
