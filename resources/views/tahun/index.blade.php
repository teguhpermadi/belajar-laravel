@extends('adminlte::page')

@section('title', 'Tahun')

@section('content_header')
    {{ Breadcrumbs::render('tahun') }}
@stop


@section('content')
    @if (flash()->message)
        <div class="alert {{ flash()->class }}">
            {{ flash()->message }}
        </div>

        @if (flash()->level === 'error')
            This was an error.
        @endif
    @endif

    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Tahun Pelajaran">
                <a href="{{ route('tahun.create') }}" class="btn btn-primary mb-3">Baru</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatables-example" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Semester</th>
                                <th>Kepala Sekolah</th>
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
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        console.log('Hi!');
        $(document).ready(function() {
            $('#datatables-example').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('tahun.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'tahun',
                        name: 'tahun'
                    },
                    {
                        data: 'semester',
                        name: 'semester'
                    },
                    {
                        data: 'kepala_sekolah.fullname',
                        name: 'kepala_sekolah.fullname'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>
@stop
