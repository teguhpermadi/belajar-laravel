<aside class="control-sidebar control-sidebar-{{ config('adminlte.right_sidebar_theme') }}" style="padding: 16px">
    @yield('right-sidebar')
    @livewire('ubah-tahun-ajaran')
    <a class="btn btn-warning mt-3 text-dark btn-block" href="{{ request()->fullUrl() }}" role="button">Ubah Tahun</a>
</aside>
