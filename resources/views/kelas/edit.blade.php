@extends('adminlte::page')

@section('title', 'Profil Sekolah')
@section('plugins.Chartjs', true)
@section('plugins.BootstrapSwitch', true)
@section('plugins.Select2', true)

@section('content_header')
    {{ Breadcrumbs::render('kelas.edit', $data) }}
@stop

@section('content')

    <div class="row">
        <div class="col-6">
            <x-adminlte-card title="Data Kelas">
                <canvas id="jenisKelamin"></canvas>
            </x-adminlte-card>
        </div>
        <div class="col-6">
            <x-adminlte-profile-widget name="{{ Str::upper($data->walikelas->fullname) }}"
                desc="Walikelas {{ Str::title($data->nama) }}" theme="primary" img="https://picsum.photos/id/200/200"
                header-class="text-left">
                <x-adminlte-profile-col-item title="I'm also" text="Artist" size=3
                    class="text-orange border-right border-warning" />
                <x-adminlte-profile-col-item title="Loves" text="Music" size=6
                    class="text-orange border-right border-warning" />
                <x-adminlte-profile-col-item title="Like to" text="Travel" size=3 class="text-orange" />
            </x-adminlte-profile-widget>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('kelas.update', $data->id) }}" method="post">
            <x-adminlte-card title="Edit Anggota Kelas">
                    @method('put')
                    @csrf
                    <input type="hidden" name="kelas_id" value="{{ $data->id }}">
                @livewire('kelas.edit-rombel', ['kelas_id' => $data->id])
                
                <x-slot name="footerSlot">
                    <button type="submit" class="btn btn-primary">simpan</button>
                </x-slot>
            </x-adminlte-card>
        </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.css"
        integrity="sha512-2sFkW9HTkUJVIu0jTS8AUEsTk8gFAFrPmtAxyzIhbeXHRH8NXhBFnLAMLQpuhHF/dL5+sYoNHWYYX2Hlk+BVHQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"
        integrity="sha512-vSyPWqWsSHFHLnMSwxfmicOgfp0JuENoLwzbR+Hf5diwdYTJraf/m+EKrMb4ulTYmb/Ra75YmckeTQ4sHzg2hg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
@stop
