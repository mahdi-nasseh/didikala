<?php

namespace Didikala\Controller;

use Didikala\Lib\Controller;
use Didikala\Model\Product as ProductModel;

class Profile extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            $data = [
                'profile' => ''
            ];
            $this->view('home/profile',$data);
        } else {
            $this->view('home/index');
        }
    }

    public function unlike($product_id)
    {
        $product = ProductModel::find($product_id);
        $product->unlike($_SESSION['user_id']);
        header("Location:" . URLRoot . "/profile");
    }


}