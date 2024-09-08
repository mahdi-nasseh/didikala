<?php

namespace Didikala\Controller;

use Didikala\Lib\Controller;
use Didikala\Model\Category;
use Didikala\Model\Product;

class Product_list extends Controller
{
    //show all the posts
    public function index()
    {
        $products = Product::with('categories')->limit(100)->get();
        $this->view('product/search', $products);
    }

    //single page
    public function product($product_id = 0)
    {
        $data = [
            'product_id' => $product_id,
        ];
        $this->view('product/product', $data);
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $param = $_POST['keyword'];
            $posts = Product::where('title', 'LIKE', '%' . $param . '%')->get();
            $data = [
                'category' => '',
                'posts' => $posts,
            ];
            $this->view('product/search',$data);
        }
    }

    public function category($param)
    {
        if (is_array($param)) {
            if (isset($param[1])) {
                $sort = $param[1];
                $order = $param[2];
            }
            $category = Category::where('ID', $param[0])->first();
            $posts = $category->posts()->orderBy($sort, $order)->get();
            $data = [
                'category' => $category,
                'posts' => $posts,
                'sort' => $sort,
                'order' => $order,
            ];
            var_dump($data);
            exit();
        } else {
            $category = Category::where('ID', $param)->first();
            $posts = $category->posts()->orderBy('created_at', 'desc')->limit(20)->get();
            if ($posts->count() > 0) {
                $data = [
                    'category' => $category,
                    'posts' => $posts
                ];
            } else {
                $data = 'empty';
            }
        }
        $this->view('product/search', $data);
    }


}