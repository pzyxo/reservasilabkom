<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $userModel = new UserModel();
        $data =
        [
            'list' => $userModel->findAll(),
            'page' => "users",
        ];
        return view('/admin/users/users', $data);
    }
    public function getdata(){
        if($this->request->isAJAX()){
            $userModel = new UserModel();
            $data = [
                'list' => $userModel->findAll(),
            ];

            $hasil = [
                'data' => view('/admin/users/users', $data)
            ];
            echo json_encode($hasil);
        } else {
            exit("Data tidak dapat diload");
        }
    }

    public function detail($email){
        $data = 
        [
            'page' => "users",
            'item' => $this->userModel->getDetail($email),
        ];
        return view('admin/users/detail', $data);
    }

    public function getform(){
        if($this->request->isAJAX()){
            $hasil = [
                'data' => view('/login/form')
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit("Data tidak dapat diload");
        }
    }

    public function login(){
        $userModel = new UserModel();
        $data =
        [
            'list' => $userModel->findAll(),
            'page' => "login",
        ];
        return view('/login/login', $data);
    }

    public function insertAjax(){
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'namadepan' => [
                'label' => 'Nama Depan',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],


            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],

            'telepon' => [
                'label' => 'No. Telepon',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong', 
                    'numeric' => 'hanya isi {field} dengan angka']
            ],

            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 8 karakter'
                ]
            ],

            'password2' => [
                'label' => 'Password',
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Harus sama dengan {field} di atas'
                ]
            ],

            'avatar' => [
                'label' => 'Gambar Profil',
                'rules' => 'mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,500]',
                'errors' => [
                    'mime_in' => '{field} pilih format file jpg, jpeg, atau png',
                    'max_size' => 'Ukuran {field} maksimal 500 kb'
                ]
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'error' => [
                    'namadepan' => $validasi->getError('namadepan'),
                    'email' => $validasi->getError('email'),
                    'telepon' => $validasi->getError('telepon'),
                    'password' => $validasi->getError('password'),
                    'password2' => $validasi->getError('password2'),
                    'avatar' => $validasi->getError('avatar')
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $namaavatar = $avatar->getRandomName();
                $avatar->move(ROOTPATH . 'public/img/users/', $namaavatar);
            } else {
                $namaavatar = 'default.png';
            }

            $input = [
                'nama' => $nama,
                'alamat' => $this->request->getVar('alamat'),
                'telepon' => $this->request->getVar('telepon'),
                'email' => $this->request->getVar('email'),
                'password' => hash('sha256', $this->request->getVar('password')),
                'civitas' => $this->request->getVar('civitas'),
                'avatar' => $namaavatar
            ];
            $this->userModel->save($input);
            $pesan = [
                'sukses' => 'Data anggota berhasil diinput'
            ];
            return $this->response->setJSON($pesan);
        }
    }
}
