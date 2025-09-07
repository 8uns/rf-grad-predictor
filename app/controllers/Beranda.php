<?php
class Beranda extends Controller{ 
    public function index(){
        $data['judul'] = 'Informasi';
        $data['gambar'] = 'img/img';

        
        $this->view('templates/head', $data);
        $this->view('templates/headerfront', $data);
        $this->view('templates/beranda', $data);
        $this->view('templates/footer');
        $this->view('templates/foot');

    }

    public function getDetailInfo(){
        echo json_encode($this->model('Beranda_model')->getInfoDetail($_POST['id']));
    }
}
