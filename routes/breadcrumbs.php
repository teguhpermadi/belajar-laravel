<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Beranda
Breadcrumbs::for('beranda', function (BreadcrumbTrail $trail) {
    $trail->push('Beranda', route('home'));
});

// Beranda > Profil
Breadcrumbs::for('profil', function (BreadcrumbTrail $trail) {
    $trail->parent('beranda');
    $trail->push('Profil Sekolah', route('sekolah.index'));
});

// Beranda > Profil > [nama sekolah]
Breadcrumbs::for('index sekolah', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('profil');
    $trail->push($data->nama);
});

// Beranda > Profil > [nama sekolah] > edit
Breadcrumbs::for('edit sekolah', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('index sekolah', $data);
    $trail->push('Edit');
});


// Beranda > Data
Breadcrumbs::for('data', function (BreadcrumbTrail $trail) {
    $trail->parent('beranda');
    $trail->push('Data');
});

// Beranda > Data > Siswa
Breadcrumbs::for('siswa', function (BreadcrumbTrail $trail) {
    $trail->parent('data');
    $trail->push('Siswa', route('siswa.index'));
});

// Beranda > Data > Siswa > [nama siswa]
Breadcrumbs::for('show siswa', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('siswa', route('siswa.index'));
    $trail->push($data->fullname);
});

// Beranda > Data > Siswa
Breadcrumbs::for('guru', function (BreadcrumbTrail $trail) {
    $trail->parent('data');
    $trail->push('Guru', route('guru.index'));
});

// Beranda > Data > Guru > [nama siswa]
Breadcrumbs::for('show guru', function (BreadcrumbTrail $trail, $data) {
    $trail->parent('guru', route('guru.index'));
    $trail->push($data->fullname);
});