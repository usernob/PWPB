<?php

class Siswa extends Controller
{
    public function index()
    {
        $data = [
            "judul" => "Data Siswa",
            "siswa" => $this->model("Siswa_model")->getAllSiswa()
        ];
        return $this->view("siswa/index", $data);
    }

    public function detail($id)
    {
        $data = [
            "judul" => "Detail Siswa",
            "siswa" => $this->model("Siswa_model")->getSiswaById($id)
        ];
        return $this->view("siswa/detail", $data);
    }

    public function tambah()
    {
        if ($this->model("Siswa_model")->tambahData($_POST) > 0) {
            Flasher::setFlash("berhasil", "ditambahkan", "success");
        } else {
            Flasher::setFlash("gagal", "ditambahkan", "danger");
        }
        header("Location: " . BASE_URL . "/siswa");
        exit;
    }
    public function hapus($id)
    {
        if ($this->model("Siswa_model")->hapusDataSiswa($id) > 0) {
            Flasher::setFlash("berhasil", "dihapus", "success");
        } else {
            Flasher::setFlash("gagal", "dihapus", "danger");
        }
        header("Location: " . BASE_URL . "/siswa");
        exit;
    }

    public function getUbah()
    {
        echo json_encode($this->model("Siswa_model")->getSiswaById($_POST["id"]));
    }

    public function ubah()
    {
        if ($this->model("Siswa_model")->ubahDataSiswa($_POST) > 0) {
            Flasher::setFlash("berhasil", "diubah", "success");
        } else {
            Flasher::setFlash("gagal", "diubah", "danger");
        }
        header("Location: " . BASE_URL . "/siswa");
        exit;
    }
}
