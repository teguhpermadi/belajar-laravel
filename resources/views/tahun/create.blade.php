@extends('adminlte::page')

@section('title', 'Profil Sekolah')

@section('content_header')
{{ Breadcrumbs::render('tahun.create') }}
@stop

    @section('content')

    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Tahun Pelajaran">
                <form action="{{ route('tahun.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <x-adminlte-input name="tahun" label="Tahun Pelajaran" fgroup-class="col-md-12" value="{{ old('tahun') }}"/>
                        @error('tahun')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <x-adminlte-select name="semester" label="Semester" fgroup-class="col-md-12">
                            <option value="">Pilih Semester</option>
                            <option value="ganjil" {{ old('semester') == 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="genap" {{ old('semester') == 'genap' ? 'selected' : '' }}>Genap</option>
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
                        <x-adminlte-input-date name="tanggal_awal" label="Tanggal Awal" :config="$config"  fgroup-class="col-md-12" value="{{ old('tanggal_awal') }}"/>
                        @error('tanggal_awal')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="row">
                        <x-adminlte-select name="user_id" label="Kepala Sekolah" fgroup-class="col-md-12" value="{{ old('user_id') }}">
                            <option value="">Pilih Kepala Sekolah</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->IdentitasUser->fullname }}</option>
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