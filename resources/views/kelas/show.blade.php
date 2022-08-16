@extends('adminlte::page')

@section('title', 'Profil Sekolah')
@section('plugins.Chartjs', true)
@section('plugins.BootstrapSwitch', true)

@section('content_header')
{{ Breadcrumbs::render('kelas.show', $data) }}
@stop

@section('content')

<div class="row">
    <div class="col-6">
        <x-adminlte-card title="Data Kelas">
            <canvas id="jenisKelamin"></canvas>
        </x-adminlte-card>
    </div>
    <div class="col-6">
        <x-adminlte-profile-widget name="{{ Str::upper($data->walikelas->fullname) }}" desc="Walikelas {{ Str::title($data->nama) }}" theme="primary"
            img="https://picsum.photos/id/200/200" header-class="text-left">
            <x-adminlte-profile-col-item title="I'm also" text="Artist" size=3
                class="text-orange border-right border-warning"/>
            <x-adminlte-profile-col-item title="Loves" text="Music" size=6
                class="text-orange border-right border-warning"/>
            <x-adminlte-profile-col-item title="Like to" text="Travel" size=3
                class="text-orange"/>
        </x-adminlte-profile-widget>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <x-adminlte-card title="Anggota Kelas">
                <div class="table-responsive">       
                    <table class="table table-bordered" id="datatables-example" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
        </x-adminlte-card>
    </div>
</div>
{{ $laki }}
{{ $data->kelas_id }}

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    var ctx = document.getElementById("jenisKelamin").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [{
                data: [{{ $laki }}, {{ $perempuan }}],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    ],
                hoverOffset: 4
            }],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Jenis Kelamin',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        },
    });
</script>
<script>
    $(document).ready( function () {
        $('#datatables-example').DataTable({
            processing: true,
            serverSide: true,
            method: 'GET',
            ajax: "{{ route('kelas.siswaRombel', $data->id) }}",
            columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                        { data: 'user.fullname', name: 'user.fullname' },
                        { data: 'user.jenis_kelamin', name: 'user.jenis_kelamin' },
                        { data: 'action', name: 'action' },
                    ]
        });
    });
</script>
@stop
