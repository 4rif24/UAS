<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdiModel;

class Prodi extends BaseController
{
    protected $pm;
    private $menu;    
    private $rules;    
    public function __construct()  
    {
        $this->pm = new ProdiModel();
        
        $this->menu = [
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
                'aktif'=>'active',                
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
        $this->rules = [
            'id_prodi' => [
                'rules' =>'required',
                'errors' => [
                    'required' =>  'Id Prodi Tidak Boleh Kosong',
                    ]
                ],
            'nama_prodi' =>  [
                'rules' =>'required',
                'errors' => [
                    'required' =>  'Nama Prodi Tidak Boleh Kosong',
                    ]
                ],
            'fakultas' =>  [
                'rules' =>'required', 
                'errors' => [
                    'required' =>  'Fakultas Tidak Boleh Kosong',
                    ]
                ],
            'password' =>  [
                'rules' =>'required',
                'errors' => [
                    'required' =>  'Password Tidak Boleh Kosong',
                    ]
                ],
        ];
    }
    public function index()
    {
        

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right"> 
                                <li class="breadcrumb-item"><a href="' . base_url() . ' ">Beranda</a></li>
                                <li class="breadcrumb-item active">Prodi</li>
                                
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data Prodi";

        $query = $this->pm->find();
        $data['data_prodi'] = $query;
        return view('prodi/content' , $data);

    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right"> 
                                <li class="breadcrumb-item"> <a href="'. base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"> <a href="'. base_url() . '/prodi">Prodi</a></li>
                                <li class="breadcrumb-item active">Tambah Prodi</li>
                                
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Prodi';
        $data['action'] = base_url() . '/prodi/simpan';
        return view('prodi/input', $data);
    }

    public function simpan()
    {
       

        if (strtolower($this->request->getMethod()) !== 'post')
        {             
            return redirect()->back()->withInput(); 
        }
        if (! $this->validate($this->rules)) 
        {

            return redirect()->back()->withInput(); 
        }
        $dt = $this->request->getPost();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to('prodi')->with('success','Data Berhasil Disimpan');
            //code...
        } catch (\CodeIgniter\Database\Exceptions\DataException $e) {
            session()->setFlashdata('error',$e->getMessage());
            return redirect()->back()->withInput();
        }       
    } 

    public function hapus($id){

        if(empty($id)){
            return redirect()->back()->with('error','Hapus data gagal dilakukan');
        } 
        try {
            $this->pm->delete($id);
            return redirect()->to('prodi')->with('success','data prodi dengan '.$id.' berhasil Dihapus!');
        } catch (\CodeIgniter\Database\Exceptions\DataException $e) {
            return redirect()->to('prodi')->with('error',$e->getMessage());
            
        }
    }

    public function edit($id){
        $breadcrumb = '<div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right"> 
                                <li class="breadcrumb-item"> <a href="'. base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"> <a href="'. base_url() . '/prodi">Prodi</a></li>
                                <li class="breadcrumb-item active">Tambah Prodi</li>
                                
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit Prodi';
        $data['action'] = base_url() . '/prodi/update';
        $data['edit_data'] = $this->pm->find($id);
        return view('prodi/input', $data);
    }

    public function update(){
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['password']);
        if(!$this->validate($this->rules)){
            return redirect()->back()->withInput();
        }
        if(empty($dtEdit['password'])){
            unset($dtEdit['password']);
        }
        try {
            $this->pm->update($param,$dtEdit);
            return redirect()->to('prodi')->with('success','Data Berhasil Di Update');
        } catch (\CodeIgniter\Database\Exceptions\DataException $e) {
            session()->setFlashdata('error',$e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
 