<div style="text-align: center">
    @if($identitas_user['avatar'] != null)
        <img src="{{ asset('storage/uploads/avatars/' . $identitas_user['avatar']) }}"
            class="identitas-image img-circle elevation-2 mr-3" alt="{{ $identitas_user['fullname'] }}" height="30">
    @else
        <img src="{{ Avatar::create($identitas_user['fullname'])->toBase64() }}"
            class="identitas-image img-circle elevation-2 mr-3" alt="{{ $identitas_user['fullname'] }}" height="30">
    @endif
</div>