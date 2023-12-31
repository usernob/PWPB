<?php

class Guru extends Controller
{
    public function index()
    {
        $data = [
            "judul" => "Data Guru",
            "guru" => $this->model("Guru_model")->getAllGuru(),
            "jurusan" => $this->model("Jurusan_model")->getAllNamaJurusan()
        ];
        return $this->view("guru/index", $data);
    }

    public function tambah()
    {
        if ($this->model("Guru_model")->tambahData($_POST) > 0) {
            Flasher::setFlash("berhasil", "ditambahkan", "success");
        } else {
            Flasher::setFlash("gagal", "ditambahkan", "danger");
        }
        header("Location: " . BASE_URL . "/guru");
        exit;
    }
    public function hapus($id)
    {
        if ($this->model("Guru_model")->hapusDataGuru($id) > 0) {
            Flasher::setFlash("berhasil", "dihapus", "success");
        } else {
            Flasher::setFlash("gagal", "dihapus", "danger");
        }
        header("Location: " . BASE_URL . "/guru");
        exit;
    }

    public function getUbah()
    {
        echo json_encode($this->model("Guru_model")->getGuruById($_POST["id"]));
    }

    public function ubah()
    {
        if ($this->model("Guru_model")->ubahDataGuru($_POST) > 0) {
            Flasher::setFlash("berhasil", "diubah", "success");
        } else {
            Flasher::setFlash("gagal", "diubah", "danger");
        }
        header("Location: " . BASE_URL . "/guru");
        exit;
    }
}
