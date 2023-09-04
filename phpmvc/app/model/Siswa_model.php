<?php

class Siswa_model extends Model
{
    function getAllSiswa()
    {
        $this->stmt = $this->dbh->prepare("SELECT nmSiswa, idSiswa FROM siswa");
        $this->stmt->execute();
        return $this->resultSet();
    }

    function getSiswaById($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT siswa.*, jurusan.nmJurusan as jurusan FROM siswa LEFT JOIN jurusan ON siswa.idJurusan = jurusan.idJurusan WHERE idSiswa = ?");
        $this->stmt->execute([$id]);
        return $this->single();
    }

    public function tambahData($data)
    {
        $query = "INSERT INTO siswa (nmSiswa, jenis_kelamin, alamat) VALUES (:nama, :jenis_kelamin, :alamat)";
        $this->query($query);
        $this->bind("nama", $data["nama"]);
        $this->bind("jenis_kelamin", $data["jenis_kelamin"]);
        $this->bind("alamat", $data["alamat"]);
        $this->execute();
        return $this->rowCount();
    }

    public function hapusDataSiswa($id)
    {
        $query = "DELETE FROM siswa WHERE idSiswa = :id";
        $this->query($query);
        $this->bind("id", $id);
        $this->execute();
        return $this->rowCount();
    }

    public function ubahDataSiswa($data)
    {
        $query = "UPDATE siswa SET nmSiswa = :nama, jenis_kelamin = :jenis_kelamin, alamat = :alamat WHERE idSiswa = :id";
        $this->query($query);
        $this->bind("nama", $data["nama"]);
        $this->bind("jenis_kelamin", $data["jenis_kelamin"]);
        $this->bind("alamat", $data["alamat"]);
        $this->bind("id", $data["id"]);
        $this->execute();
        return $this->rowCount();
    }
}
