<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Buat object mahasiswa dengan data dummy (nama, nim, email, jurusan, fakultas, foto)
        // - Kirim object tersebut ke view 'profil'
        $mahasiswa = (object)[
            'nama' => 'Rahmania Anggraini',
            'nim' => '102022300034',
            'email' => 'rhmnanggraini@gmail.com',
            'jurusan' => 'Sistem Informasi',
            'fakultas' => 'Rekayasa Industri',
            'foto' => asset('images/Rahmania.jpg')
        ];

        return view('Profil', ['mahasiswa' => $mahasiswa]);

    }
}
