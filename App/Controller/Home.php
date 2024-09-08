<?php

namespace Didikala\Controller;
use Didikala\Lib\Controller;
use Didikala\Model\Product;

class Home extends Controller{

     public function index(){
        $products = Product::with('categories')->get();
        $data = [
            'products' => $products,
        ];
        $this->view('home/index',$data);
    }


}