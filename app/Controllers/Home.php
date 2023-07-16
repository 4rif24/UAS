<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' =>[
                'title'=>'Beranda',
                'link'=> base_url(),
                'icon'=>'fa fa-house',                
                'aktif'=>'active',                
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
                'aktif'=>'',                
            ],
            'mahasiswa' =>[
                'title'=>'Mahasiswa',
                'link'=> base_url() . '/mahasiswa',
                'icon'=>'fa fa-users',
                'aktif'=>'',

            ],
        ];

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Beranda</li>                                
                            </ol>
                        </div><';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Welcom to mysite";
        $data['selamat_datang'] = "selamat datang di sini";
        return view('template/content',$data);
    }
}
