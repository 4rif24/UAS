<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Semester extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' =>[
                'title'=>'Beranda',
                'link'=> base_url(),
                'icon'=>'fa fa-house',                
                'aktif'=>'',                
            ],
            'prodi' =>[
                'title'=>'Prodi',
                'link'=> base_url() . '/prodi',
                'icon'=>'fa-solid fa-building-columns',
                'aktif'=>'',                
            ],
            'semester' =>[
                'title'=>'Semester',
                'link'=> base_url() . '/semester',                
                'icon'=>'fa fa-list',
                'aktif'=>'active',                
            ],
            'mahasiswa' =>[
                'title'=>'Mahasiswa',
                'link'=> base_url() . '/mahasiswa',
                'icon'=>'fa fa-users',
                'aktif'=>'',

            ],
        ];

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Semester</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item <a href="' . base_url() . ' ">Beranda</a></li>
                                <li class="breadcrumb-item active">Semester</li>
                                
                            </ol>
                        </div><';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        return view('semester/content' , $data);

    }
}
