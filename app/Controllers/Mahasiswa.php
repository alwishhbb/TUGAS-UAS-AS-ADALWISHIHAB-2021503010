<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda'=>[
                'title'=>'Beranda',
                'link'=>base_url(),
                'icon'=>'fa-solid fa-house',
                'aktif'=>'',
            ],
            'mhs'=>[
                'title'=>'List Mahasiswa',
                'link'=>base_url().'/prodi',
                'icon'=>'fa-solid fa-user',
                'aktif'=>'',
            ],
            'nilai'=>[   
                'title'=>'nilai',
                'link'=>base_url().'/nilai',
                'icon'=>'fa-solid fa-marker',
                'aktif'=>'',
            ],
            'mahasiswa'=>[
                'title'=>'Mahasiswa',
                'link'=>base_url().'/mahasiswa',
                'icon'=>'fa-solid fa-users',
                'aktif'=>'active',
            ],
        ];

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Mahasiswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">Mahasiswa</li>
                            </ol>
                        </div>';
        $data ['menu'] = $menu;
        $data ['breadcrumb'] = $breadcrumb;
        return view('mahasiswa/content', $data);
    }
}