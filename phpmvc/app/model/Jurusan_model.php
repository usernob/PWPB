<?php

class Jurusan_model extends Model
{
    function getAllJurusan()
    {
        $this->stmt = $this->dbh->prepare("SELECT nmJurusan, DetailJurusan, idJurusan FROM jurusan");
        $this->stmt->execute();
        return $this->resultSet();
    }

    function getAllNamaJurusan()
    {
        $this->stmt = $this->dbh->prepare("SELECT nmJurusan, idJurusan FROM jurusan");
        $this->stmt->execute();
        return $this->resultSet();
    }

    function getJurusanById($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT jurusan.* FROM jurusan WHERE idJurusan = ?");
        $this->stmt->execute([$id]);
        return $this->single();
    }

    public function tambahData($data)
    {
        $query = "INSERT INTO jurusan (nmJurusan, DetailJurusan) VALUES (:nma, :detail)";
        $this->query($query);
        $this->bind("nama", $data["nama"]);
        $this->bind("detail", $data["detail"]);
        $this->execute();
        return $this->rowCount();
    }

    public function hapusDataJurusan($id)
    {
        $query = "DELETE FROM jurusan WHERE idJurusan = :id";
        $this->query($query);
        $this->bind("id", $id);
        $this->execute();
        return $this->rowCount();
    }

    public function ubahDataJurusan($data)
    {
        $query = "UPDATE jurusan SET nmJurusan = :nama, DetailJurusan = :detail WHERE idJurusan = :id";
        $this->query($query);
        $this->bind("nama", $data["nama"]);
        $this->bind("detail", $data["detail"]);
        $this->bind("id", $data["id"]);
        $this->execute();
        return $this->rowCount();
    }
}
