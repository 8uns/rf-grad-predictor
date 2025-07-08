<?php

class Klasifikasi_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
        // $this->executeRF();
    }


    public function executeRF()
    {
        $start_time = microtime(true);
        $this->db->query("SELECT prodi, jk, ip_s1, ip_s2, ip_s3, ip_s4, ip_s5, ip_s6, ip_s7, ip_s8, ip_s9, ip_s10, ip_s11, ip_s12, ip_s13, lama_studi, predikat FROM mhs");
        $data = json_encode($this->db->resultSet());
        $this->db->close();

        // Simpan ke file JSON sementara
        $tempFile = 'C:/xampp/htdocs/rf.kelulusan/public/file/data.json';
        file_put_contents($tempFile, $data);
        // echo $tempFile;

        // $output = shell_exec('C:\Users\nabu\AppData\Local\Programs\Python\Python313\python.exe C:\xampp\htdocs\rf.kelulusan\app\models\RF_model.py');
        // echo $output;


        // var_dump(function_exists('shell_exec'));
        // echo shell_exec("python3 --verion");
        // echo $tempFile;
        // echo '<br>';

        // $commandPython = 'python C:\xampp\htdocs\rf.kelulusan\app\models\RF_model.py';
        $commandPython = 'python C:\xampp\htdocs\rf.kelulusan\app\models\RF_model.py ' . escapeshellarg($tempFile);
        // $output = shell_exec($commandPython);
        shell_exec($commandPython);

        $end_time = microtime(true);
        $execution_time = round($end_time - $start_time, 4);
        // echo "Output dari python \n\n <br><br>";
        // echo $output;

        echo '<script>window.location.href = "' . BASEURL . 'klasifikasi/hasil/' . $execution_time . '";</script>';
        exit();
    }

    public function getResultJson()
    {
        // Read the JSON file
        $json = file_get_contents('C:/xampp/htdocs/rf.kelulusan/public/file/dataReturn.json');

        // Check if the file was read successfully
        if ($json === false) {
            die('Error reading the JSON file');
        }


        // Decode the JSON file
        $json_data = json_decode($json, true);

        // Check if the JSON was decoded successfully
        if ($json_data === null) {
            die('Error decoding the JSON file');
        }

        return $json_data;
    }
}
