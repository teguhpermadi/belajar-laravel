@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
<h1>Kelas</h1>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Form Kelas">
        @livewire('kelas.form-kelas')
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
