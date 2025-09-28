<?php

class Klasifikasi_model
{

    private $db;
    private $pythonExecutable = '/home/buns/python3.13_env/bin/python3.13';
    private $pathFiles = '/var/www/html/rf-grad-predictor/public/file/';
    private $pathModels = '/var/www/html/rf-grad-predictor/app/models/';

    public function __construct()
    {
        $this->db = new Database;
        // $this->executeRF();
    }


    public function executeRF()
    {
        $start_time = microtime(true);
        $this->db->query("SELECT prodi, jk, ip_s1, ip_s2, ip_s3, ip_s4, predikat FROM mhs");
        // $this->db->query("SELECT prodi, jk, ip_s1, ip_s2, ip_s3, ip_s4, CONVERT( ROUND((ip_s1+ip_s2+ip_s3+ip_s4)/4,2), CHARACTER) ip_avg, predikat FROM mhs");
        // $this->db->query("SELECT prodi, jk, ip_s1, ip_s2, ip_s3, ip_s4,
        // CASE
        // WHEN tahun_masuk % 2 = 0 THEN 1 
        // ELSE 0                         
        // END AS tahun_masuk, predikat FROM mhs");
    //     $this->db->query("SELECT prodi, jk, ip_s1, ip_s2, ip_s3, ip_s4,
    //     CONVERT( ROUND((ip_s1+ip_s2+ip_s3+ip_s4)/4,2), CHARACTER) ip_avg,
    //     CASE
    //     WHEN tahun_masuk % 2 = 0 THEN 1 
    //     ELSE 0                         
    // END AS tahun_masuk, predikat FROM mhs");
        $data = json_encode($this->db->resultSet());
        $this->db->close();

        // Simpan ke file JSON sementara
        $tempFile = $this->pathFiles . 'data.json';
        file_put_contents($tempFile, $data);

        $commandPython = $this->pythonExecutable . ' ' . $this->pathModels . 'RF_model.py ' . escapeshellarg($tempFile);
        // $output = shell_exec($commandPython);
        // echo $commandPython;
        echo "<br>";
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
        $json = file_get_contents($this->pathFiles . 'dataReturn.json');

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


    public function predictFrom($data)
    {
        // Path ke file JSON sementara
        $tempFile = $this->pathFiles . 'dataPredict.json';

        // Siapkan data dari input form sesuai format JSON yang diinginkan
        $dataToPredict = [
            "prodi" => $data['prodi'] ?? '',
            "jk" => $data['jk'] ?? '',
            "ip_s1" => $data['ip_s1'] ?? '',
            "ip_s2" => $data['ip_s2'] ?? '',
            "ip_s3" => $data['ip_s3'] ?? '',
            "ip_s4" => $data['ip_s4'] ?? '',
        ];

        // Encode array menjadi format JSON tunggal
        $jsonEncodedData = json_encode($dataToPredict);

        // Simpan ke file JSON sementara
        if (file_put_contents($tempFile, $jsonEncodedData) === false) {
            echo "Gagal menyimpan data ke file JSON sementara.";
            exit(); // Hentikan eksekusi jika gagal menyimpan file
        }

        // --- DEBUGGING: Tampilkan string JSON yang telah disimpan ---
        // echo "<h3>Debugging Informasi:</h3>";
        // echo "<strong>1. String JSON yang disimpan ke file:</strong><br>";
        // echo "<pre>" . htmlspecialchars($jsonEncodedData) . "</pre><br>";
        // echo "<strong>2. Jalur file JSON sementara:</strong><br>";
        // echo "<pre>" . htmlspecialchars($tempFile) . "</pre><br>";


        // Jalur ke executable Python dan skrip Python Anda
        $pythonScript = $this->pathModels . 'Predict_rf_model.py';

        // Meneruskan jalur file JSON sebagai argumen ke skrip Python
        // Gunakan escapeshellarg untuk memastikan jalur file ditangani dengan benar oleh shell
        $escapedFilePathArgument = escapeshellarg($tempFile);

        // Membangun perintah lengkap
        // $commandPython = $pythonExecutable . ' ' . $pythonScript . ' ' . $escapedFilePathArgument;
        $commandPython = $this->pythonExecutable  . ' ' . $pythonScript . ' ' . $escapedFilePathArgument;

        // --- DEBUGGING: Tampilkan perintah lengkap yang akan dieksekusi ---
        // echo "<strong>3. Perintah lengkap yang dieksekusi:</strong><br>";
        // echo "<pre>" . htmlspecialchars($commandPython) . "</pre><br>";

        // Eksekusi perintah Python
        $output = shell_exec($commandPython);

        // --- DEBUGGING: Tampilkan output mentah dari Python ---
        // echo "<strong>4. Output mentah dari Python:</strong><br>";
        // echo "<pre>" . htmlspecialchars($output) . "</pre><br>";

        // Coba decode output Python untuk melihat apakah itu JSON yang valid
        $decodedOutput = json_decode($output, true);
        $data = $decodedOutput;
        // echo "<strong>5. Output Python (decoded JSON):</strong><br>";
        // if (json_last_error() === JSON_ERROR_NONE) {
        //     echo "<pre>" . htmlspecialchars(json_encode($decodedOutput, JSON_PRETTY_PRINT)) . "</pre>";
        //     // $data = htmlspecialchars(json_encode($decodedOutput, JSON_PRETTY_PRINT));

        // } else {
        //     echo "<pre>Tidak dapat mendekode output Python sebagai JSON. Error: " . json_last_error_msg() . "</pre>";
        // }

        // Opsional: Hapus file sementara setelah digunakan
        // unlink($tempFile);

        // Anda mungkin ingin mengarahkan pengguna setelah prediksi
        // header('Location: ' . BASEURL . 'klasifikasi/hasil/' . $execution_time);
        // exit();
        return $data;
    }
}
