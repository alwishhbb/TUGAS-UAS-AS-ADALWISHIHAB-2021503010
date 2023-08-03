<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdiModel;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

class Prodi extends BaseController
{
    protected $pm;
    private  $menu; 
    private $rules;
    public function __construct()
    {
        $this->pm = new ProdiModel();

        $this->menu = [
            'beranda'=>[
                'title'=>'Beranda',
                'link'=>base_url(),
                'icon'=>'fa-solid fa-house',
                'aktif'=>'',
            ],
            'prodi'=>[
                'title'=>'List mahasiswa',
                'link'=>base_url().'/prodi',
                'icon'=>'fa-solid fa-user',
                'aktif'=>'active',
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
                'aktif'=>'',
            ],
        ];

        $this->rules = [
            'kdmhs' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Mahasiswa tidak boleh kosong',
                ]
            ],
            'nama_mhs' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Mahasiswa tidak boleh kosong',
                ]
            ],
            'fakultas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fakultas tidak boleh kosong',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password tidak boleh kosong',
                ]
            ],
        ];

    }
    public function index()
    {

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Prodi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">Prodi</li>
                            </ol>
                        </div>';
        $data ['menu'] = $this->menu;
        $data ['breadcrumb'] = $breadcrumb;
        $data ['title_card'] = "Data Mahasiswa";

        $query = $this->pm->find();
        $data['data_prodi'] = $query;
        return view('prodi/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Prodi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Prodi</a></li>
                                <li class="breadcrumb-item active">Tambah Prodi</li>
                          
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Prodi';
        $data['action'] = base_url() . '/prodi/simpan';
        return view('prodi/input',$data);
    }

    public function simpan()
    {   
        if (strtolower($this->request->getMethod()) !== 'post'){
    
            return redirect()->back()->withInput();
        }

            if (!$this->validate($this->rules)){
                return redirect()->back()->withInput();
            }

            
            $dt = $this->request->getPost();

            try {
                $simpan = $this->pm->insert($dt);
                return redirect()->to('prodi')->with('success','Data Berhasil disimpan');
          
            } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e){
                
                session()->setFlashdata('error',$e->getMessage());
                return redirect()->back()->withInput();
            }
    }
    public function hapus($id)
    {
        if(empty($id)){
            return redirect()->back()->with('error','hapus gagal Dilakukan');
        }
        try {
            $this->pm->delete($id);
            return redirect()->to('prodi')->with('succes','data Prodi dengan kode '.$id.'berhasil dibuang');
        }catch(\CodeIgniter\Database\Exceptions\DatabaseException $e){
            return redirect()->to('prodi')->with('error',$e->getMessage());
        }
        
    }

    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Prodi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Prodi</a></li>
                                <li class="breadcrumb-item active">Tambah Prodi</li>
                          
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Prodi';
        $data['action'] = base_url() . '/prodi/simpan';
        return view('prodi/input',$data); 
    }
}