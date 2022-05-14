@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{ Breadcrumbs::render('tahun.create') }}
@stop

    @section('content')

    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Edit Tahun Pelajaran">
                <form action="{{ route('tahun.update', $data->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <x-adminlte-input name="tahun" label="Tahun Pelajaran" fgroup-class="col-md-12" value="{{ $data->tahun }}"/>
                        @error('tahun')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <x-adminlte-select name="semester" label="Semester" fgroup-class="col-md-12">
                            <option value="">Pilih Semester</option>
                            <option value="ganjil" {{ $data->semester == 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="genap" {{ $data->semester == 'genap' ? 'selected' : '' }}>Genap</option>
                        </x-adminlte-select>
                        @error('semester')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        @php
                        $config = ['format' => 'YYYY-MM-DD'];
                        @endphp
                        <x-adminlte-input-date name="tanggal_awal" label="Tanggal Awal" :config="$config"  fgroup-class="col-md-12" value="{{ $data->tanggal_awal }}"/>
                        @error('tanggal_awal')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="row">
                        <x-adminlte-select name="user_id" label="Kepala Sekolah" fgroup-class="col-md-12">
                            <option value="">Pilih Kepala Sekolah</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $data->kepalasekolah->id == $user->id ? 'selected' : '' }}>{{ $user->IdentitasUser->fullname }}</option>
                            @endforeach
                        </x-adminlte-select>
                        @error('user_id')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
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