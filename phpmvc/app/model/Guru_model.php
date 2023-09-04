<?php
class Guru_model extends Model
{
    function getAllGuru()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM guru");
        $this->stmt->execute();
        return $this->resultSet();
    }

    function getGuruById($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT guru.* FROM guru WHERE idGuru = ?");
        $this->stmt->execute([$id]);
        return $this->single();
    }

    public function tambahData($data)
    {
        $query = "INSERT INTO guru (nmGuru, idJurusan) VALUES (:nama, :jurusan);";
        $this->query($query);
        $this->bind("nama", $data["nama"]);
        $this->bind("jurusan", $data["jurusan"]);
        $this->execute();
        return $this->rowCount();
    }

    public function hapusDataGuru($id)
    {
        $query = "DELETE FROM guru WHERE idGuru = :id";
        $this->query($query);
        $this->bind("id", $id);
        $this->execute();
        return $this->rowCount();
    }

    public function ubahDataGuru($data)
    {
        $query = "UPDATE guru SET nmGuru = :nama, idJurusan = :jurusan WHERE idGuru = :id";
        $this->query($query);
        $this->bind("nama", $data["nama"]);
        $this->bind("jurusan", $data["jurusan"]);
        $this->bind("id", $data["id"]);
        $this->execute();
        return $this->rowCount();
    }
}
