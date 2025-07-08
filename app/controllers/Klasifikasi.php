<?php
class Klasifikasi extends Controller
{
    public function index()
    {
        // header("Content-Type: application/json; charset=UTF-8");
        $data['judul'] = 'klasifikasi';

        // print_r($data['klasifikasi']);

        $this->view('templates/head', $data);
        // $this->view('templates/header', $data);
        // $this->view('templates/sidebar', $data);
        $this->model('Klasifikasi_model')->executeRF();

        // $this->view('fitur/perangkingan', $data);
        // // // $this->view('templates/footer');
        // $this->view('templates/foot');

    }
    public function hasil($execution_time)
    {
        $data['judul'] = 'klasifikasi';
        $data['mhs'] = $this->model('Mhs_model')->getAllmhsLimit();
        $data['totalmhs'] = $this->model('Mhs_model')->getTotalMhs();
        $data['jsonResult'] = $this->model('Klasifikasi_model')->getResultJson();
        $data['execution_time'] = $execution_time;

        $this->view('templates/head', $data);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('fitur/hasilklasifikasi', $data);
    }
}
