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

    public function auth()
    {
        $session = session();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $userModel = new UserModel();
        $otentik = $userModel->where('email', $email)->first();
        if ($otentik) {
            $pass = $otentik['password'];
            $verifikasi = password_verify(md5($password), password_hash($pass, PASSWORD_DEFAULT));

            if ($verifikasi) {
                $remember = $this->request->getVar('rememberme');
                if(isset($remember)){
                    $email = 'email';
                    $nilai = $otentik['email'];
                    $durasi = strtotime('+7 days');
                    $path = "/";
                    setcookie($email, $nilai, $durasi, $path);
                }
                $sesi = [
                    'email' => $otentik['email'],
                    'id' => $otentik['id'],
                    'roles' => $otentik['roles'],
                    'loggedIn' => TRUE,
                ];
                $session->set($sesi);
                return redirect()->to(base_url());
            } else {
                $session->setFlashdata('pesan', 'Email atau Password salah ya dek');
                return redirect()->to(base_url('/signin'));
            }
        }
    }

    public function register(){
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
                $avatar->move(ROOTPATH . 'public/img/users/avatar/', $namaavatar);
            } else {
                $namaavatar = 'default.png';
            }

            $input = [
                'nama' => $nama,
                'alamat' => $this->request->getVar('alamat'),                
                'email' => $this->request->getVar('email'),
                'telepon' => $this->request->getVar('telepon'),
                'password' => md5($this->request->getVar('password')),
                'civitas' => $this->request->getVar('civitas'),
                'avatar' => $namaavatar
            ];
            
            session()->setFlashdata('suksesregis', 'Register berhasil, silahkan login');
            $this->userModel->save($input);
            $pesan = [
                'sukses' => 'Data anggota berhasil diinput'
            ];
            return $this->response->setJSON($pesan);
        }
    }
}
