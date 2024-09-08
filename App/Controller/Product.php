<?php

namespace Didikala\Controller;

use Didikala\Lib\Controller;
use Didikala\Model\Product as ProductModel;

class Product extends Controller
{
    public function index()
    {
        $this->view('product/search');
    }

    public function like($product_id)
    {
        $product = ProductModel::find($product_id);
        $product->like($_SESSION['user_id']);
        header("Location:" . URLRoot . "/product_list/product/" . $product_id);
    }

    public function unlike($product_id)
    {
        $product = ProductModel::find($product_id);
        $product->unlike($_SESSION['user_id']);
        header("Location:" . URLRoot . "/product_list/product/" . $product_id);
    }

    public function add()
    {
        global $DIR;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'add_post' => '',
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'price' => trim($_POST['price']),
                'stock' => trim($_POST['stock']),
            ];
            $target_dir = $DIR . '/Public/';
            $basename = 'uploads/products/' . "1-" . basename($_FILES['thumbnail']['name']);
            $target_file = $target_dir . $basename;
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

            $product = new ProductModel();
            $product->title = $data['title'];
            $product->content = $data['content'];
            $product->price = $data['price'];
            $product->stock = $data['stock'];
            $product->thumbnail = $basename;
            $product->save();
            $data = [
                'profile' => ''
            ];
            $this->view('home/profile', $data);
        } else {
            $data = [
                'add_post' => '',
                'title' => '',
                'content' => '',
                'price' => '',
                'stock' => '',
            ];
            $this->view('home/profile', $data);
        }
    }

    public function edit($product_id = 0)
    {
        if ($product_id > 0) {
            global $DIR;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content']),
                    'price' => trim($_POST['price']),
                    'stock' => trim($_POST['stock']),
                    'thumbnail_err' => ''
                ];
                if (empty($_FILES['thumbnail'])){
                    $data['thumbnail_err'] = 'لطفا عکس جدید را انتخاب کنید';
                    $this->view('home/profile',$data);
                }
                $target_dir = $DIR . '/Public/';
                $basename = 'uploads/products/' . time() . basename($_FILES['thumbnail']['name']);
                $target_file = $target_dir . $basename;
                move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);
                $product = ProductModel::find($product_id);
                $product->title = $data['title'];
                $product->price = $data['price'];
                $product->content = $data['content'];
                $product->stock = $data['stock'];
                $product->thumbnail = $basename;
                $product->save();
                $data = [
                    'profile' => ''
                ];
                $this->view('home/profile',$data);
            } else {
                $product = ProductModel::find($product_id);
                $data = [
                    'edit_post' => '',
                    'product_id' => $product_id,
                    'title' => $product->title,
                    'content' => $product->content,
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'thumbnail' => $product->thumbnail,
                ];
                $this->view('home/profile', $data);
            }
        }
    }

    public function delete($product_id = 0){
        if ($product_id > 0) {
            ProductModel::find($product_id)->delete();
            $data = [
                'profile' => ''
            ];
            $this->view('home/profile',$data);
        }
    }
}