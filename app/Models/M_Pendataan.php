<?php 

namespace App\Models;

use CodeIgniter\Model;

class M_Pendataan extends Model {
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getAllData()
    {
        return $this->db->table('pendataan')->get();
    }

    public function tambah($data)
    {
        return $this->db->table('pendataan')->insert($data);
    }
} 