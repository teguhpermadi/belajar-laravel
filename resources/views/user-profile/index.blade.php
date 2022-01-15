@extends('adminlte::page')

@section('title', 'Profil')

@section('content_header')
<h1>Profil</h1>
@stop

    @section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <x-adminlte-card title="Foto Profil" icon="fas fa-lg fa-portrait">

                    @if($user->avatar != null)
                        <img src="{{ asset('storage/uploads/avatars/'.$user->avatar) }}"
                            style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

                    @else

                        <img src=" {{ Avatar::create(Auth::user()->name)->toBase64() }}"
                            style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

                    @endif
                    <form enctype="multipart/form-data" action="{{ route('update_avatar') }}"
                        method="POST">
                        <input type="hidden" name="avatar_old" value="{{ $user->avatar }}">
                        <label>Update foto profil</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <br>
                        <x-adminlte-button class="" theme="primary" label="simpan" icon="fas fa-sign-in"
                            type="submit" />
                    </form>

                    <form action="{{ route('delete_avatar') }}" method="post">
                        @csrf
                        <input type="hidden" name="avatar_old" value="{{ $user->avatar }}">
                        <x-adminlte-button class="mt-3" theme="danger" label="hapus avatar" icon="fas fa-sign-in"
                            type="submit" />
                    </form>

                </x-adminlte-card>
            </div>
            <div class="col-12">
                <x-adminlte-card title="Identitas" icon="fas fa-lg fa-user" collapsible>
                    <form action="{{ route('update_profile') }}" method="post">
                        @csrf
                        <x-adminlte-input name="name" label="Nama Lengkap" placeholder="nama lengkap"
                            value="{{ $user->name }}" />

                        <x-adminlte-input name="tempatlahir" label="Tempat Lahir" placeholder="tempat lahir"
                            value="{{ $user->tempatlahir }}" />


                        @php
                            $config = ['format' => 'YYYY-MM-DD'];
                        @endphp
                        <x-adminlte-input-date name="tanggallahir" label="Tanggal Lahir" :config="$config"
                            placeholder="Choose a date..." value="{{ $user->tanggallahir }}">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-danger">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>

                        @php
                            $options = ['laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan'];
                            $selected = $user->jeniskelamin;
                        @endphp

                        <x-adminlte-select name="jeniskelamin" label="Jenis Kelamin">
                            <x-adminlte-options :options="$options" empty-option="jenis kelamin"
                                :selected="$selected" />
                        </x-adminlte-select>

                        <x-adminlte-input name="alamat" label="Alamat" placeholder="alamat"
                            value="{{ $user->alamat }}" />

                        <x-adminlte-button class=" ml-auto" theme="primary" label="simpan" icon="fas fa-sign-in"
                            type="submit" />
                    </form>
                </x-adminlte-card>
            </div>
            <div class="col-12">
                <x-adminlte-card title="Email & Password" icon="fas fa-lg fa-key" collapsible>
                    <form action="{{ route('update_emailpassword') }}" method="post">
                        @csrf
                        <x-adminlte-input name="username" label="Username" placeholder="username"
                            value="{{ $user->username }}" />
                        <x-adminlte-input name="email" type="email" label="Email" placeholder="email"
                            value="{{ $user->email }}" />
                        <x-adminlte-input name="current_password" label="Password Lama" type="password"
                            placeholder="password lama" />
                        <x-adminlte-input name="new_password" label="Password baru" type="password"
                            placeholder="password baru" />
                        <x-adminlte-input name="new_confirm_password" label="Konfirmasi password" type="password"
                            placeholder="konfirmasi ulang password baru" />
                        <x-adminlte-button class=" ml-auto" theme="primary" label="simpan" icon="fas fa-sign-in"
                            type="submit" />
                    </form>
                </x-adminlte-card>
            </div>
        </div>
    </div>
    @endsection

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

        @section('js')
        <script>
            console.log('Hi!');
        </script>
        @stop