@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{ Breadcrumbs::render('tahun.show', $data) }}
@stop

    @section('content')

    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Tahun Pelajaran">
            <table class="table table-striped">
                <tr>
                    <td>Tahun</td>
                    <td>{{ $data->tahun }}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{ $data->semester }}</td>
                </tr>
                <tr>
                    <td>Tanggal Awal</td>
                    <td>{{ $data->tanggal_awal }}</td>
                </tr>
                <tr>
                    <td>Kepala Sekolah</td>
                    <td>{{ Str::title($data->kepalasekolah->identitasuser->fullname) }}</td>
                </tr>
            </table>
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