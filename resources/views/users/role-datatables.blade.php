<div>
    @foreach ($roles as $role)
        @switch($role['name'])
            @case('pd')
               <span class="badge badge-primary">Peserta Didik</span>
                @break
            @case('ptk')
               <span class="badge badge-warning text-white">Pendidik dan Tenaga Kependidikan</span>
                @break
            @case('admin')
               <span class="badge bg-maroon text-white">Admin</span>
                @break
            @case('super admin')
               <span class="badge bg-indigo text-white">Super Admin</span>
                @break
            @default
               <span class="badge badge-secondary">User</span>
        @endswitch
    @endforeach
</div>