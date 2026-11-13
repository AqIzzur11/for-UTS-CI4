<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'Menu0145';

    public function getProduct($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_menu' => $id]);
        }
    }

    public function insertProduct($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateProduct($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_menu' => $id]);
    }

    public function deleteProduct($id)
    {
        return $this->db->table($this->table)->delete(['id_menu' => $id]);
    }
}