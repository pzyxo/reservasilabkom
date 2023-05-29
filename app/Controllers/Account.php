<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\ReservasiModel;

class Account extends BaseController
{
    protected $userModel;
    protected $reservasiModel;
    protected $adminModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->reservasiModel = new ReservasiModel();
        $this->adminModel = new AdminModel();
    }

    public function success()
    {
        $data =
            [
                'page' => "success",
            ];
        return view('users/login/successAlert', $data);
    }

    public function logout()
    {
        $sesi = session();
        $sesi->destroy();

        return redirect()->to(base_url());
    }

    public function index()
    {
        $userModel = new UserModel();
        $idses = session()->get('id');
        $data =
            [
                'item' => $userModel->getDetail($idses),
                'page' => "profile",
            ];
        return view('/users/profile', $data);
    }

    public function admin()
    {
        return view('/admin/login');
    }

    public function authAdmin()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $adminModel = new AdminModel();
        $otentik = $adminModel->where('username', $username)->first();
        if ($otentik) {
            $pass = $otentik['password'];
            $verifikasi = password_verify($password, $pass);

            if ($verifikasi) {
                $sesi = [
                    'username' => $otentik['username'],
                    'id' => $otentik['id'],
                    'adminLoggedIn' => TRUE,
                ];
                $session->set($sesi);
                return redirect()->to(base_url('/admin/users'));
            } else {
                $session->setFlashdata('pesan', 'Email atau Password salah ya dek');
                return redirect()->to(base_url('/signin'));
            }
        }
    }

    public function edit($email)
    {
        $userModel = new UserModel();
        if ($this->request->isAJAX()) {
            $item = $userModel->where(['email' => $email])->first();
            $nama = explode(" ", $item['nama']);
            $data = [
                'id' => $item['id'],
                'email' => $item['email'],
                'nama_depan' => $nama[0],
                'nama_belakang' => $nama[1],
                'alamat' => $item['alamat'],
                'civitas' => $item['civitas'],
                'avatar' => $item['avatar'],
                'telepon' => $item['telepon'],
                'alamat' => $item['alamat'],
                'password' => $item['password'],
            ];
            $hasil = [
                'data' => view('users/edit', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('data tidak dapat dimuat');
        }
    }

    public function update($id)
    {
        $validasi = \Config\Services::validation();
        $valid = $this->validate([
            'namadepan' => [
                'label' => 'Nama Depan',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],


            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'telepon' => [
                'label' => 'No. Telepon',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => 'hanya isi {field} dengan angka'
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
                    'avatar' => $validasi->getError('avatar')
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $namaavatar = $avatar->getRandomName();
                $avatar->move(zROOTPATH . 'public/img/users/avatar/', $namaavatar);
            } else {
                $namaavatar = $this->request->getVar('avalama');
            }
            if (($this->request->getVar('password')) != '') {
                $pass = md5($this->request->getVar('password'));
            } else {
                $pass = $this->request->getVar('passlama');
            }

            $input = [
                'nama' => $nama,
                'alamat' => $this->request->getVar('alamat'),
                'email' => $this->request->getVar('email'),
                'telepon' => $this->request->getVar('telepon'),
                'password' => $pass,
                'civitas' => $this->request->getVar('civitas'),
                'avatar' => $namaavatar
            ];
            $this->userModel->update($id, $input);
            $pesan = [
                'sukses' => 'Data anggota berhasil diinput'
            ];
            return $this->response->setJSON($pesan);
        }
    }

    public function reservation()
    {
        $validasi = \Config\Services::validation();
        date_default_timezone_set('Asia/Jakarta');
        $currentDate = strtotime(date('Y-m-d h:i:s'));
        $time_start = strtotime($this->request->getVar('time_start'));
        $time_end = strtotime($this->request->getVar('time_end'));
        $tanggal_reservasi = strtotime($this->request->getVar('tanggal_reservasi') . " " . $this->request->getVar('time_start'));
        $selisihHari = floor(($tanggal_reservasi - $currentDate) / (60));
        $durasi = floor(($time_end - $time_start) / (60));
        $valid = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'labID' => [
                'label' => 'Lab ID',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ]);
        if (!$valid) {
            $pesan = [
                'error' => [
                    'email' => $validasi->getError('email'),
                    'labID' => $validasi->getError('labID')
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            if ($this->request->getVar('status') == 1) {
                if ($durasi >= 30 && $durasi < 300 && $selisihHari > 1440 && $selisihHari < 20160) {
                    $civitas = $this->request->getVar('civitas');
                    if ($civitas == 'UNS') {
                        $biaya = $durasi * 0;
                    } else {
                        $biaya = $durasi * 1000;
                    }
                    $input = [
                        'userID' => $this->request->getVar('email'),
                        'labID' => $this->request->getVar('labID'),
                        'civitas' => $civitas,
                        'tanggal_reservasi' => $this->request->getVar('tanggal_reservasi'),
                        'time_start' => $this->request->getVar('time_start'),
                        'time_end' => $this->request->getVar('time_end'),
                        'biaya' => $biaya,
                    ];
                    $labID = $this->request->getVar('labID');
                    $tanggal = $this->request->getVar('tanggal_reservasi');
                    $time_started = $this->request->getVar('time_start');
                    $time_ended = $this->request->getVar('time_end');
                    $db = db_connect();
                    $query = "SELECT * FROM `reservasi` WHERE `labID`= $labID AND `tanggal_reservasi` = '$tanggal' AND `time_start` BETWEEN '$time_started' AND '$time_ended';";
                    if (count($db->query($query)->getResult()) == 0) {

                        $this->reservasiModel->save($input);
                        $pesan = [
                            'sukses' => 'Reservasi Berhasil'
                        ];
                        return $this->response->setJSON($pesan);
                    } else {
                        $pesan = [
                            'terisi' => 'Jadwal sudah terisi',
                        ];
                        return $this->response->setJSON($pesan);
                    }
                } else {
                    $pesan = [
                        'gagal' => 'Reservasi Gagal, cek tanggal dan waktu reservasi'
                    ];
                    return $this->response->setJSON($pesan);
                }
            } else {
                $pesan = [
                    'status' => 'Tunggu verifikasi akun dulu'
                ];
                return $this->response->setJSON($pesan);
            }
        }
    }

    public function history($email)
    {
        if ($this->request->isAJAX()) {
            $data = [
                'list' => $this->reservasiModel->where('userID', $email)->findAll(),
            ];

            $hasil = [
                'data' => view('/users/history', $data)
            ];
            echo json_encode($hasil);
        } else {
            echo json_encode("Data tidak dapat diload");
        }
    }
}
