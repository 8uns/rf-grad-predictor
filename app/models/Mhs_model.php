<?php

class Mhs_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    // public function delmhs($id)
    // {
    //     $this->db->query("DELETE FROM mhs WHERE mhs_id =" . $id);
    //     return $this->db->execute();
    // }
    public function getAllmhs()
    {
        $this->db->query(
            "SELECT  * FROM `mhs`"
        );
        return $this->db->resultSet();
    }

    public function getAllmhsLimit($i = 1)
    {
        $i = ($i - 1) * 20;
        $this->db->query(
            "SELECT  * FROM `mhs` LIMIT $i,20"
        );
        return $this->db->resultSet();
    }

    public function getTotalMhs()
    {
        $this->db->query(
            "SELECT  COUNT(*) totalmhs FROM `mhs`"
        );
        return $this->db->single();
    }

    public function getTotalMhsByPredikat()
    {
        $this->db->query(
            "SELECT COUNT(*) totalpredikat, predikat FROM `mhs` GROUP BY predikat"
        );
        return $this->db->resultSet();
    }

    public function getTotalMhsByTahun()
    {
        $this->db->query(
            "SELECT COUNT(*) total, tahun_masuk FROM mhs GROUP BY tahun_masuk"
        );
        return $this->db->resultSet();
    }


    public function getAllmhsById()
    {
        $this->db->query(
            "SELECT  * FROM `mhs` WHERE mhs_id=" . $_SESSION['user_id']
        );
        return $this->db->resultSet();
    }



    public function getAllmhsJoinVisits()
    {
        $this->db->query(
            "SELECT  * FROM `mhs` JOIN visits USING(mhs_id)"
        );
        return $this->db->resultSet();
    }




    // public function createAcount($data)
    // {
    //     $data['password'] = md5($data['password']);
    //     $query = "INSERT INTO mhs 
    //                 (nim, name, username,  gender, phone, password) 
    //                     VALUES
    //                     (:nim, :name, :username, :gender, :phone, :password)";
    //     $this->db->query($query);
    //     $this->db->bind('nim', $data['nim']);
    //     $this->db->bind('name', $data['name']);
    //     $this->db->bind('username', $data['username']);
    //     $this->db->bind('gender', $data['gender']);
    //     $this->db->bind('phone', $data['phone']);
    //     $this->db->bind('password', $data['password']);

    //     $this->db->execute();
    //     return $this->db->rowCount();
    // }

    // public function updatemhs($data, $id)
    // {
    //     if ($data['password'] == '' || $data['password'] == null) {
    //         $query = "UPDATE mhs 
    //                 SET 
    //                 nim=:nim,
    //                 name=:name, 
    //                 username=:username, 
    //                 gender=:gender,
    //                 phone=:phone

    //                 WHERE mhs_id=:mhs_id
    //                     ";
    //         $this->db->query($query);
    //     } else {
    //         $data['password'] = md5($data['password']);
    //         $query = "UPDATE mhs 
    //                 SET 
    //                 nim=:nim,
    //                 name=:name, 
    //                 username=:username, 
    //                 password=:password, 
    //                 gender=:gender,
    //                 phone=:phone

    //                 WHERE mhs_id=:mhs_id
    //                     ";
    //         $this->db->query($query);
    //         $this->db->bind('password', $data['password']);
    //     }
    //     $this->db->bind('nim', $data['nim']);
    //     $this->db->bind('name', $data['name']);
    //     $this->db->bind('username', $data['username']);
    //     $this->db->bind('gender', $data['gender']);
    //     $this->db->bind('phone', $data['phone']);
    //     $this->db->bind('mhs_id', $id);
    //     $this->db->execute();
    //     if ($_SESSION['level'] > 0) {
    //         $_SESSION['name'] = $data['name'];
    //     }
    //     return $this->db->rowCount();
    // }
}
