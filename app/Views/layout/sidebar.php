<div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar ">
        <?php

        use App\Models\KelasModel;

        if (session()->get('id_akses') == 3) : ?>
            <div class="text-center mt-5">
                <div class="profile-image">
                    <img class="w-50 rounded-circle" src="<?= base_url('assets/img/siswa/' . auth()->image); ?>" alt="profile image">
                </div>
                <div class="profile-name text-white mt-3">
                    <?= auth()->name; ?>
                </div>
                <div class="profile-name text-white">
                    <i class="mdi <?php if (auth()->gender == 'Laki-laki') : ?>mdi-gender-male text-primary<?php else : ?>mdi-gender-female text-danger<?php endif; ?>"></i>
                    <?= auth()->gender; ?>
                </div>
                <span class="badge badge-success text-white">
                    <?php $data = new KelasModel();
                    $kelas = $data->asObject()->where('id', auth()->id_kelas)->first(); ?>
                    <?= $kelas->kelas . '|' . $kelas->jurusan; ?>
                </span>
            </div>
        <?php else : ?>
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="profile-image">
                            <img class="img-xs rounded-circle" src="<?= base_url('assets/img/' . (session()->get('id_akses') == 2 ? "guru/" : (session()->get('id_akses') == 1 ? "admin/" : "siswa/")) . auth()->image); ?>" alt="profile image">
                            <div class="dot-indicator bg-success"></div>
                        </div>
                        <div class="text-wrapper">
                            <p class="profile-name"><?= auth()->name; ?></p>
                            <p class="designation"><?= (session()->get('id_akses') == 1 ? "Administrator" : (session()->get('id_akses') == 2 ? "Guru" : "Siswa")); ?></p>
                        </div>
                    </a>
                </li>
                <li class="nav-item nav-category">Main Menu</li>
                <li class="nav-item ">
                    <a class="nav-link" href="/">
                        <i class="menu-icon typcn typcn-document-text"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <?php if (session()->get('email') && session()->get('id_akses') == 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon typcn typcn-coffee"></i>
                            <span class="menu-title">Master</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('guru'); ?>">Guru</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('siswa'); ?>">Siswa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('kelas'); ?>">Kelas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('mapel'); ?>">Mata Pelajaran</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (session()->get('nip') && session()->get('id_akses') == 2) : ?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon typcn typcn-coffee"></i>
                            <span class="menu-title">Master</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('ujian'); ?>">Jadwal Ujian</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/forms/basic_elements.html">
                            <i class="menu-icon typcn typcn-shopping-bag"></i>
                            <span class="menu-title">Laporan</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (session()->get('nus') && session()->get('id_akses') == 3) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('jadwal'); ?>">
                            <i class="menu-icon typcn typcn-shopping-bag"></i>
                            <span class="menu-title">Ujian</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../pages/forms/basic_elements.html">
                            <i class="menu-icon typcn typcn-shopping-bag"></i>
                            <span class="menu-title">Hasil</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('profile'); ?>">
                        <i class="menu-icon typcn typcn-user-outline"></i>
                        <span class="menu-title">My Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('logout'); ?>" id="logoutsidebar" class="nav-link">
                        <span class="menu-title">Logout</span>
                    </a>
                </li>
            </ul>
        <?php endif; ?>
    </nav>