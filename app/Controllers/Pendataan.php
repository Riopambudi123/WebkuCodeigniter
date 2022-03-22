<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Pendataan;

class Pendataan extends Controller{

    public function __construct()
    {
        $this->model = new M_Pendataan;
    }
    public function index()
    {
        $data = [
            'judul' => 'Pendataan',
            'pendataan' => $this->model->getAllData()
        ];
        
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('pendataan/index');
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'data' => 'required',
                'nama' => 'required'
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Pendataan',
                    'pendataan' => $this->model->getAllData()
                ];
                
                echo view('templates/v_header', $data);
                echo view('templates/v_sidebar');
                echo view('templates/v_topbar');
                echo view('pendataan/index');
                echo view('templates/v_footer');
            } else {
                $data = [
                    'data' => $this->request->getPost('data'),
                    'nama' => $this->request->getPost('nama')
                ];
        
                // insert data
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('pendataan'));
                }
            }
        } else {
            return redirect()->to(base_url('pendataan'));
        }
    }
}