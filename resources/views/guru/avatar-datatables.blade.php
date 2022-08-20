<div>
    @if($avatar != null)
        <img src="{{ asset('storage/uploads/avatars/'.$avatar)}}"
            class="identitas-image img-circle elevation-2 mr-3" alt="{{ $fullname }}" height="30">
    @else
        <img src="{{ Avatar::create($fullname)->toBase64() }}"
            class="identitas-image img-circle elevation-2 mr-3" alt="{{ $fullname }}" height="30">
    @endif

    <a href="{{ route('guru.show', $id) }}">{{ $fullname }}</a>
    
</div>