@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{-- <h1>Profil Sekolah</h1> --}}
{{ Breadcrumbs::render('index sekolah', $sekolah) }}
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Data Sekolah">
            <dl class="row">
                <dt class="col-sm-4">Nama Sekolah</dt>
                <dd class="col-sm-8">{{ $sekolah->nama }}</dd>
                <dt class="col-sm-4">NPSN</dt>
                <dd class="col-sm-8">{{ $sekolah->npsn }}</dd>
                <dt class="col-sm-4">alamat</dt>
                <dd class="col-sm-8">{{ $sekolah->alamat }}</dd>
            </dl>
            @livewire('alamat.show-alamat', ['village' => $sekolah->kelurahan])
            <dl class="row">
                <dt class="col-sm-4">kodepos</dt>
                <dd class="col-sm-8">{{ $sekolah->kodepos }}</dd>
                <dt class="col-sm-4">email</dt>
                <dd class="col-sm-8">{{ $sekolah->email }}</dd>
                <dt class="col-sm-4">website</dt>
                <dd class="col-sm-8">{{ $sekolah->website }}</dd>
            </dl>
            <x-slot name="footerSlot">
                    <a href="{{ route('sekolah.edit', $sekolah->id) }}" class="btn btn-warning">Edit</a>
            </x-slot>
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
