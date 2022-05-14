<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Beranda
Breadcrumbs::for('beranda', function (BreadcrumbTrail $trail) {
    $trail->push(Str::upper('Beranda'), route('home'));
});

// Beranda > Profil
Breadcrumbs::for('profil', function (BreadcrumbTrail $trail) {
    $trail->parent('beranda');
    $trail->push(Str::upper('Profil Sekolah'), route('sekolah.index'));
});

// Beranda > Profil > [nama sekolah]
Breadcrumbs::for('index sekolah', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('profil');
    $trail->push(Str::upper($data->nama));
});

// Beranda > Profil > [nama sekolah] > edit
Breadcrumbs::for('edit sekolah', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('index sekolah', $data);
    $trail->push(Str::upper('Edit'));
});


// Beranda > Data
Breadcrumbs::for('data', function (BreadcrumbTrail $trail) {
    $trail->parent('beranda');
    $trail->push(Str::upper('Data'));
});

// Beranda > Data > Siswa
Breadcrumbs::for('siswa', function (BreadcrumbTrail $trail) {
    $trail->parent('data');
    $trail->push(Str::upper('Siswa'), route('siswa.index'));
});

// Beranda > Data > Siswa > [nama siswa]
Breadcrumbs::for('show.siswa', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('siswa', route('siswa.index'));
    $trail->push(Str::upper($data->fullname));
});

// Beranda > Data > Siswa
Breadcrumbs::for('guru', function (BreadcrumbTrail $trail) {
    $trail->parent('data');
    $trail->push(Str::upper('Guru'), route('guru.index'));
});

// Beranda > Data > Guru > [nama siswa]
Breadcrumbs::for('show.guru', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('guru', route('guru.index'));
    $trail->push(Str::upper($data->fullname));
});

// Beranda > Kelas
Breadcrumbs::for('kelas', function (BreadcrumbTrail $trail) {
    $trail->parent('beranda');
    $trail->push(Str::upper('Kelas'));
});

// Beranda > Tahun 
Breadcrumbs::for('tahun', function (BreadcrumbTrail $trail) {
    $trail->parent('beranda');
    $trail->push(Str::upper('Tahun'), route('tahun.index'));
});

// Beranda > Tahun > Baru
Breadcrumbs::for('tahun.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tahun');
    $trail->push(Str::upper('Baru'));
});

// Beranda > Tahun > [Nama Tahun]
Breadcrumbs::for('tahun.show', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('tahun', route('tahun.index'));
    $trail->push($data->tahun);
    $trail->push(Str::upper($data->semester));
});