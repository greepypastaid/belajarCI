<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan.');
        }

        return view('komik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Komik',
            'errors' => session('errors') ?? []
        ];

        return view('komik/create', $data);
    }

    public function save()
    {
        if (!$this->validate(
            [
                'judul' => 'required|is_unique[komik.judul]',
                'penulis' => 'required',
                'penerbit' => 'required',
                'sampul' => [
                    'rules' => 'uploaded[sampul]|max_size[sampul,1024]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Harap pilih gambar.',
                        'max_size' => 'Ukuran gambar terlalu besar (maks 1MB).',
                        'mime_in' => 'Format gambar tidak valid (hanya JPG/JPEG/PNG).',
                    ],
                ],
            ]
        )) {
            return redirect()->to('/komik/create')->with('errors', $this->validator->getErrors());
        }

        // buat ambil sampul dari request
        $fileSampul = $this->request->getFile('sampul');
        // dd($fileSampul);

        // Generate nama random biar beda beda nama sampulnya
        $namaSampul = $fileSampul->getRandomName();

        //pindahin sampul ke folder public/img
        $fileSampul->move('img', $namaSampul);

        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul // bua ambil nama sampul ke db berbentuk string
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data Komik',
            'errors' => session('errors') ?? [],
            'komik' => $this->komikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }

    public function update($id)
    {
        // Ambil data komik lama untuk redirect dan cek sampul
        $komikLama = $this->komikModel->find($id);

        // Cek apakah ada file yang diupload
        $fileSampul = $this->request->getFile('sampul');

        // Tentukan rules untuk sampul (opsional jika tidak upload file baru)
        if ($fileSampul->getError() == 4) {
            // Tidak ada file yang diupload, sampul opsional
            $ruleSampul = 'permit_empty';
        } else {
            // Ada file yang diupload, validasi file
            $ruleSampul = 'max_size[sampul,1024]|mime_in[sampul,image/jpg,image/jpeg,image/png]';
        }

        if (!$this->validate(
            [
                'judul' => 'required|is_unique[komik.judul,id,' . $id . ']',
                'penulis' => 'required',
                'penerbit' => 'required',
                'sampul' => [
                    'rules' => $ruleSampul,
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar (maks 1MB).',
                        'mime_in' => 'Format gambar tidak valid (hanya JPG/JPEG/PNG).',
                    ],
                ],
            ]
        )) {
            return redirect()->to('/komik/edit/' . $komikLama['slug'])->with('errors', $this->validator->getErrors());
        }

        // Cek apakah ada file sampul baru yang diupload
        if ($fileSampul->getError() == 4) {
            // Tidak ada file baru, pakai nama sampul lama
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // Ada file baru
            // Generate nama random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
            // Hapus file lama jika ada dan bukan default
            $sampulLama = $this->request->getVar('sampulLama');
            if ($sampulLama && file_exists('img/' . $sampulLama)) {
                unlink('img/' . $sampulLama);
            }
        }

        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/komik');
    }
}
