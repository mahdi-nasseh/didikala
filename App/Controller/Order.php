<?php

namespace Didikala\Controller;

use Didikala\Lib\Controller;
use Didikala\Model\Cart;
use Didikala\Model\Order as OrderModel;
use Didikala\Model\Order_items;
use Didikala\Model\Product;

class Order extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location:' . URLRoot . '/user/login');
        } elseif (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            header('Location:' . URLRoot . '/cart');
        }
    }

    public function add()
    {
        $order = new OrderModel();
        $order->user_id = $_SESSION['user_id'];
        $order->subtotal = Cart::get_total_price();
        $order->total = Cart::get_total_sale_price();
        $order->gateway = 'zarinpal';
        $order->save();

        foreach ($_SESSION['cart'] as $cartItem) {
            Order_items::create([
                'order_id' => $order->ID,
                'product_id' => $cartItem['ID'],
                'qantity' => $cartItem['quantity'],
                'price' => $cartItem['price'],
                'sale_price' => $cartItem['sale_price'],
            ]);

            //process on product information
            $product = Product::find($cartItem['ID']);
            $product->decrement('stock', $cartItem['quantity']);
            $product->increment('sale_count', $cartItem['quantity']);
            $product->total_sale += $cartItem['sale_price'];
            $product->save();
        }

        $reference_id = '';
        $array = ['1','2','3','4','5','6','7','8','9'];
        for ($i = 0; $i < 10; $i++){
            $reference_id .= $array[rand(0, count($array) - 1)];
        }
        $order->reference_id = $reference_id;
        $order->status = 'complete';
        $order->save();
        Cart::clear();
        header('Location:' . URLRoot . '/order/complete/'. $order->ID);
    }

    public function complete($reference_id){
        $this->view('home/order', $reference_id);
    }
}