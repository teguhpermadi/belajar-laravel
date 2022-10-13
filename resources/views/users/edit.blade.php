@extends('adminlte::page')

@section('plugins.Select2', true)
@section('title', 'Users Role Edit')
@section('content_header')
    <h1>Users Role Edit</h1>
@stop

@section('content')
    
    <div class="row">
        <div class="col-12">
            <x-adminlte-card title="Identitas Diri" theme="primary" theme-mode="outline" collapsible>
                <table class="table table-striped">
                    <tr>
                        <td style="width:50%">Nama Lengkap</td>
                        <td>{{ Str::title($user->fullname) }}</td>
                    </tr>
                    <tr>
                        <td>Nama Panggilan</td>
                        <td>{{ Str::title($user->nickname) }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ Str::title($user->jenis_kelamin) }}</td>
                    </tr>
                    
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>@livewire('tempat-lahir.show-tempat-lahir', ['city' => $user->tempat_lahir])</td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{ $user->tanggal_lahir }}</td>
                    </tr>
                    
                    <tr>
                        <td>Email</td>
                        <td>{{ Str::lower($user->email) }}</td>
                    </tr>
                </table>
            </x-adminlte-card>
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <x-adminlte-card title="Role {{ $user->fullname }}">
                    @php
                        $config = [
                            "placeholder" => "Select multiple options...",
                            "allowClear" => true,
                        ];
                    @endphp
                    <x-adminlte-select2 id="roles" name="roles[]" label="Roles"
                        label-class="text-danger" igroup-size="sm" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-dark" label="Clear" icon="fas fa-lg fa-ban text-danger"/>
                        </x-slot>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}"
                                @foreach ($user->roles as $userrole)
                                    @selected($role->name == $userrole->name)
                                @endforeach
                                >{{ $role->name }}</option>
                        @endforeach
                    </x-adminlte-select2>

                    <x-slot name="footerSlot">
                        <button type="submit" class="btn btn-primary">simpan</button>
                    </x-slot>
                </x-adminlte-card>
            </form>
    </div>
</div>

@stop

@section('css')
    
@stop

@section('js')
    
@stop