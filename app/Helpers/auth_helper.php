<?php

use App\Models\{AdminModel, GuruModel, SiswaModel};


function auth()
{
    $email = session()->get('email');
    $nip = session()->get('nip');
    $nus = session()->get('nus');
    $idAksess = session()->get('id_akses');
    $admin = new AdminModel;
    $guru = new GuruModel();
    $siswa = new SiswaModel();

    if ($email && $idAksess == 1) {
        return $admin->asObject()->where('email', $email)->first();
    } elseif ($nip && $idAksess == 2) {
        return $guru->asObject()->where('nip', $nip)->first();
    } else {
        return $siswa->asObject()->where('nus', $nus)->first();
    }
}
