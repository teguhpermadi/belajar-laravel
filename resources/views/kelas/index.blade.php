@extends('adminlte::page')
@section('plugins.BootstrapSwitch', true)
@section('title', 'Profil Sekolah')

@section('content_header')
{{ Breadcrumbs::render('kelas') }}
@stop

@section('content')

@if(flash()->message)
        <div class="alert {{ flash()->class }}">
            {{ flash()->message }}
        </div>

        @if(flash()->level === 'error')
            This was an error.
        @endif
    @endif

<div class="row">
    <div class="col-12">
        <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Baru</a>                
    </div>
</div>
<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Kelas">
                <div class="table-responsive">       
                <table class="table table-bordered" id="datatables-example" width="100%">
                <thead>
                   <tr>
                      <th>No</th>
                      <th>Nama Kelas</th>
                      <th>Tingkat</th>
                      <th>Walikelas</th>
                      <th>Jumlah Siswa</th>
                      <th>Actions</th>
                   </tr>
                </thead>
             </table>
                </div>
        </x-adminlte-card>
    </div>
</div>

@stop

@section('css')
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
{{-- <link  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"> --}}
<link  href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
            <script>
                console.log('Hi!');
                $(document).ready( function () {
                    $('#datatables-example').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('kelas.data') }}",
                        columns: [
                                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                                    { data: 'kelas', name: 'kelas' },
                                    { data: 'level', name: 'level' },
                                    { data: 'walikelas.fullname', name: 'walikelas.fullname' },
                                    { data: 'rombel_count', name: 'rombel_count'},
                                    { data: 'action', name: 'action' },
                                ]
                    });
                });
            </script>
@stop
