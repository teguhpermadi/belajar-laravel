<div>
    @if($user['avatar'] != null)
        <img src="{{ asset('storage/uploads/avatars/' . $user['avatar'] )}}"
            class="identitas-image img-circle elevation-2 mr-3" alt="{{ $user['fullname'] }}" height="30">
    @else
        <img src="{{ Avatar::create($user['fullname'])->toBase64() }}"
            class="identitas-image img-circle elevation-2 mr-3" alt="{{ $user['fullname'] }}" height="30">
    @endif

    <a href="{{ route('siswa.show', $user['id']) }}">{{ $user['fullname'] }}</a>
    
</div>