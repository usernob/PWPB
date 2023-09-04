<?php

class Jurusan extends Controller
{
    public function index()
    {
        $data = [
            "judul" => "Jurusan",
            "jurusan" => $this->model("Jurusan_model")->getAllJurusan()
        ];
        return $this->view("jurusan/index", $data);
    }

    public function tambah()
    {
        if ($this->model("Jurusan_model")->tambahData($_POST) > 0) {
            Flasher::setFlash("berhasil", "ditambahkan", "success");
        } else {
            Flasher::setFlash("gagal", "ditambahkan", "danger");
        }
        header("Location: " . BASE_URL . "/jurusan");
        exit;
    }
    public function hapus($id)
    {
        if ($this->model("Siswa_model")->hapusDataSiswa($id) > 0) {
            Flasher::setFlash("berhasil", "dihapus", "success");
        } else {
            Flasher::setFlash("gagal", "dihapus", "danger");
        }
        header("Location: " . BASE_URL . "/jurusan");
        exit;
    }

    public function getUbah()
    {
        echo json_encode($this->model("Jurusan_model")->getJurusanById($_POST["id"]));
    }

    public function ubah()
    {
        if ($this->model("Jurusan_model")->ubahDataJurusan($_POST) > 0) {
            Flasher::setFlash("berhasil", "diubah", "success");
        } else {
            Flasher::setFlash("gagal", "diubah", "danger");
        }
        header("Location: " . BASE_URL . "/jurusan");
        exit;
    }
}
