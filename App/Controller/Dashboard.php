<?php

namespace Didikala\Controller;
use Didikala\Lib\Controller;
use Didikala\Model\Category;
use Didikala\Model\Product;
use Didikala\Model\User;
use Didikala\Model\Order;

class Dashboard extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            $user = \Didikala\Model\User::find($_SESSION['user_id']);
            if ($user->role == 'admin') {
                $bestSellingProducts = Product::limit(4)->orderBy('sale_count', 'desc')->get();
                $lastProducts = Product::limit(4)->orderBy('created_at', 'desc')->get();
                $lastUsers = User::limit(4)->orderBy('created_at', 'desc')->get();
                $data = [
                    'dashboard' => '',
                    'bestSellingProducts' => $bestSellingProducts,
                    'lastProducts' => $lastProducts,
                    'lastUsers' => $lastUsers,
                ];
                $this->view('home/profile', $data);
            } else {
                $data = [
                    'profile' => ''
                ];
                $this->view('home/profile', $data);
            }
        } else {
            header('location:' . URLRoot . '/user/login');
        }
    }

    public function comments()
    {
        $data = [
            'dashboardComments' => ''
        ];
        $this->view('home/profile', $data);
    }

    public function users()
    {
        $users = User::limit(50)->orderBy('created_at', 'desc')->get();
        $data = [
            'users' => $users
        ];
        $this->view('home/profile', $data);
    }

    public function categories()
    {
        $categories = Category::get();
        $data = [
            'categories' => $categories
        ];
        $this->view('home/profile', $data);
    }

    public function products()
    {
        $products = Product::limit(50)->orderBy('created_at','desc')->get();
        $data = [
            'products' => $products,
        ];
        $this->view('home/profile', $data);
    }

    public function orders()
    {
        $orders = Order::limit(50)->orderBy('created_at', 'desc')->get();
        $data = [
            'dashboardOrders' => $orders
        ];
        $this->view('home/profile', $data);
    }

    public function detail_order($order_id = 0){
        if ($order_id == 0) {
            $this->view('home/profile');
        }else{
            $order = Order::find($order_id);
            $data = [
                'dashboard_detail_order' => $order
            ];
            $this->view('home/profile', $data);
        }
    }

}