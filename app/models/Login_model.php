<?php

class Login_model
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginMember($data)
    {
        $true = false;
        $data['password'] = md5($data['password']);
        $query = "SELECT mhs_id, username, m.name name, image, nim, password, ale_id FROM mhs m LEFT JOIN alternatives USING(mhs_id) ";
        $this->db->query($query);
        $this->db->execute();
        $dataMember = $this->db->resultSet();
        foreach ($dataMember as $user) {
            if ($user['username'] == $data['username'] && $user['password'] == $data['password']) {
                $_SESSION['user_id'] = $user['mhs_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['image'] = $user['image'];
                $_SESSION['ale'] = $user['ale_id'];
                $_SESSION['level'] = 5;

                $true = true;
            }
        }
        return $true;
    }

    public function loginAdmin($data)
    {
        $true = false;
        $data['password'] = md5($data['password']);
        $query = "SELECT * FROM administrators";
        $this->db->query($query);
        $this->db->execute();
        $dataMember = $this->db->resultSet();
        $this->db->close();

        $query = "SELECT * FROM mhs";
        $this->db->query($query);
        $this->db->execute();
        $dataOfficer = $this->db->resultSet();
        $this->db->close();


        foreach ($dataMember as $user) {
            if ($user['username'] == $data['username'] && $user['password'] == $data['password']) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['user_id'] = $user['administrator_id'];
                $_SESSION['image'] = '';
                $_SESSION['level'] = $user['levels'];
                $true = true;
            }
        }
        return $true;
    }

    public function login($user, $data)
    {
        if ($user == 'member') {
            return $this->loginMember($data);
        } else {
            return $this->loginAdmin($data);
        }
    }
}
