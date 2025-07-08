<?php
class Dashboard extends Controller
{
    public function index()
    {
        $data['judul'] = 'dashboard';
        $data['gambar'] = 'img/img';

        $data['totalmhs'] = $this->model('Mhs_model')->getTotalMhs();
        $data['totalpredikat'] = $this->model('Mhs_model')->getTotalMhsByPredikat();

        $this->view('templates/head', $data);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        // if ($_SESSION['level'] == 0) {
        $this->view('templates/dashboard', $data);
        // } else {
        //     $data['valalternatif'] = $this->model('Alternatif_model')->getValAltByIdMhs($_SESSION['user_id']);
        //     $data['kriteria'] = $this->model('Kriteria_model')->getAllKriteria();

        //     $this->view('templates/dashboardmhs', $data);
        // }

        // $this->view('templates/footer');
        $this->view('templates/foot');
    }



    public function getMhs()
    {
        echo json_encode($this->model('Mhs_model')->getTotalMhs());
    }

    public function getTotalMhsByTahun()
    {
        echo json_encode($this->model('Mhs_model')->getTotalMhsByTahun());
    }
}
