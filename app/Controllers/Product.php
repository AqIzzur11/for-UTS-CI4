<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class Product extends Controller
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->getProduct();
        echo view('product/index', $data);
    }

    public function create()
    {
        return view('product/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $data = array(
            'jenis_menu'    => $this->request->getPost('jenis_menu'),
            'nama_menu'     => $this->request->getPost('nama_menu'),
            'harga'         => $this->request->getPost('harga'),
            'status_menu'   => $this->request->getPost('status_menu')
        );

        if ($validation->run($data, 'product') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('product/create'));
        } else {
            $model = new ProductModel();
            $simpan = $model->insertProduct($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created product successfully');
                return redirect()->to(base_url('product'));
            }
        }
    }

    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->getProduct($id)->getRowArray();
        echo view('product/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_menu');
        $validation = \Config\Services::validation();

        $data = array(
            'jenis_menu'    => $this->request->getPost('jenis_menu'),
            'nama_menu'     => $this->request->getPost('nama_menu'),
            'harga'         => $this->request->getPost('harga'),
            'status_menu'   => $this->request->getPost('status_menu')
        );

        if ($validation->run($data, 'product') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('product/edit/' . $id));
        } else {
            $model = new ProductModel();
            $ubah = $model->updateProduct($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated product');
                return redirect()->to(base_url('product'));
            }
        }
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $hapus = $model->deleteProduct($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted product successfully');
            return redirect()->to(base_url('product'));
        }
    }
}