<?php
class Mhs extends Controller
{
    public function index($i = 1)
    {
        $data['judul'] = 'mhs';
        $data['gambar'] = 'img/img';
        $data['mhs'] = $this->model('Mhs_model')->getAllmhsLimit($i);
        $data['totalmhs'] = $this->model('Mhs_model')->getTotalMhs();
        $data['i'] = $i;



        $this->view('templates/head', $data);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('fitur/mhsfitur', $data);
        // $this->view('templates/footer');
        $this->view('templates/foot');
    }

    // public function create()
    // {
    //     if ($this->model('Mhs_model')->createAcount($_POST)) {
    //         Flasher::setFlash('Done', 'berhasil menambahkan data mahasiswa baru', 'success');

    //         header('Location: ' . BASEURL . 'mhs');
    //         exit;
    //     } else {

    //         Flasher::setFlash('Failed', 'berhasil menambahkan data mahasiswa baru', 'danger');
    //         header('Location: ' . BASEURL . 'mhs');
    //         exit;
    //     }
    // }

    // public function update($id)
    // {
    //     print_r($_POST);
    //     if ($this->model('Mhs_model')->updatemhs($_POST, $id) > 0) {
    //         Flasher::setFlash('berhasil', 'diubah', 'success');
    //         header('Location: ' . BASEURL . 'mhs');
    //         exit;
    //     } else {
    //         Flasher::setFlash('gagal', 'diubah', 'danger');
    //         header('Location: ' . BASEURL . 'mhs');
    //         exit;
    //     }
    // }


    // public function hapusmhs($id)
    // {
    //     if ($this->model('Mhs_model')->delmhs($id)) {
    //         Flasher::setFlash('Done', 'Berhasil menghapus data mahasiswa', 'success');
    //         header('location:' . BASEURL . 'mhs');
    //         exit;
    //     } else {
    //         Flasher::setFlash('Failed', 'Gagal menghapus data mahasiswa', 'danger');
    //         header('Location: ' . BASEURL . 'mhs');
    //         exit;
    //     }
    // }
}
