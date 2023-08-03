<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Nilai extends BaseController
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
            'prodi'=>[
                'title'=>'List Mahasiswa',
                'link'=>base_url().'/prodi',
                'icon'=>'fa-solid fa-user',
                'aktif'=>'',
            ],
            'nilai'=>[   
                'title'=>'Nilai',
                'link'=>base_url().'/nilai',
                'icon'=>'fa-solid fa-marker',
                'aktif'=>'active',
            ],
            'password'=>[
                'title'=>'password',
                'link'=>base_url().'/password',
                'icon'=>'fa-solid fa-users',
                'aktif'=>'',
            ],
        ];

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">nilai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">nilai</li>
                            </ol>
                        </div>';
        $data ['menu'] = $menu;
        $data ['breadcrumb'] = $breadcrumb;
        return view('nilai/content', $data);
    }
}