<div style="text-align: center">
    @if($identitas['avatar'] != null)
        <img src="{{ asset('storage/uploads/avatars/' . $identitas['avatar']) }}"
            class="identitas-image img-circle elevation-2 mr-3" alt="{{ $identitas['fullname'] }}" height="30">
    @else
        <img src="{{ Avatar::create($identitas['fullname'])->toBase64() }}"
            class="identitas-image img-circle elevation-2 mr-3" alt="{{ $identitas['fullname'] }}" height="30">
    @endif
</div>