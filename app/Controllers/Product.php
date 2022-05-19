<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    public function index()
    {
        return view('product_page');
    }
    public function catalog()
    {
        return view('product_catalog');
    }
    public function insertdata()
    {
        $product = new ProductModel();
        $insert = $product->insert([
            'name' => 'Redmi Note 9 Pro',
            'price' => '3499000'
        ]);
        if ($insert) {
            echo "Data Berhasil diinsert";
        } else {
            echo "<pre>";
            echo print_r($product->errors());
            echo "</pre>";
        }
    }
    public function updatedata()
    {
        $product = new ProductModel();
        $id = 1;
        $update = $product->update($id, [
            'name' => 'Redmi Note 9',
            'price' => '3000000'
        ]);
        if ($update) {
            echo "Data Berhasil diupdate";
        } else {
            echo "<pre>";
            echo print_r($product->errors());
            echo "</pre>";
        }
    }
    public function saveupdate()
    {
        $product = new ProductModel();
        $data = [
            'kd_product' => 1,
            'name' => 'Redmi 9',
            'price' => '2000000'
        ];
        $product->save($data);
    }
    public function saveinsert()
    {
        $product = new ProductModel();
        $data = [
            'name' => 'Xiaomi Mi Note 10 Pro',
            'price' => '10999000'
        ];
        $product->save($data);
    }
    public function saveupdate2()
    {
        $product = new ProductModel();
        $dataProduct = $product->find(1);
        $dataProduct->price = '2050000';
        $product->save($dataProduct);
    }
    public function deletedata()
    {
        $product = new ProductModel();
        $product->purgeDeleted();
    }
}
