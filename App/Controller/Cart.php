<?php

namespace Didikala\Controller;

use Didikala\Lib\Controller;
use Didikala\Model\Product;
use Didikala\Model\Cart as CartModel;
class Cart extends Controller
{

    public function index()
    {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $this->view('home/cart');
        } else {
            $this->view('home/empty_cart');
        }
    }

    public function add($product_id)
    {
        //get product
        $product = Product::find($product_id);
        //check product exist
        if (!$product) {
            $this->view('error/404');
        }
        //add product to cart
        CartModel::add($product);
        $_SESSION['cart'][$product->ID]['price'] = CartModel::get_total_item_price($product);
        $_SESSION['cart'][$product->ID]['sale_price'] = CartModel::get_total_item_sale_price($product);
        header('Location:' . URLRoot . '/cart');
    }

    public function remove($product_id){
        //get product
        $product = Product::find($product_id);
        //check product exist or not
        if (!$product) {
            $this->view('error/404');
        }
        CartModel::remove($product);
        header('Location:' . URLRoot . '/cart');
    }


}