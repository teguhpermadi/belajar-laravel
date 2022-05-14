@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{ Breadcrumbs::render('tahun.show', $data) }}
@stop

    @section('content')

    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Edit Tahun Pelajaran">
                <dl class="row">
                    <dt class="col-sm-4">Tahun</dt>
                    <dd class="col-sm-8">{{ $data->tahun }}</dd>
                    <dt class="col-sm-4">Semester</dt>
                    <dd class="col-sm-8">{{ $data->semester }}</dd>
                    <dt class="col-sm-4">Tanggal Awal</dt>
                    <dd class="col-sm-8">{{ $data->tanggal_awal }}</dd>
                    <dt class="col-sm-4">Kepala Sekolah</dt>
                    <dt class="col-sm-8">{{ $data->kepalasekolah->identitasuser->fullname }}</dt>
                </dl>
            </x-adminlte-card>
        </div>
    </div>
    
    @stop

        @section('css')
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
        @stop

            @section('js')
            <script>
                console.log('Hi!');
                
            </script>
            @stop