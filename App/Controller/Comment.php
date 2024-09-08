<?php
namespace Didikala\Controller;

use Didikala\Lib\Controller;
use Didikala\Model\Comment as CommentModel;

Class Comment extends Controller{
    public function index($product_id){
        header('location:'.URLRoot.'/product_list/product/'.$product_id);
    }

    public function add($product_id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'content' => trim($_POST['content']),
                'product_id' => $product_id,
                'user_id' => $_SESSION['user_id'],
            ];

            if (mb_strlen($data['content']) < 10) {
                $data['content_err'] = 'محتوای دیدگاه شما کوتاه است';
            }

            if (!isset($data['content_err'])) {
                $comment = new CommentModel();
                $comment->user_id = $data['user_id'];
                $comment->product_id = $data['product_id'];
                $comment->content = $data['content'];
                $comment->save();
                header('location:'.URLRoot.'/product_list/product/'.$data['product_id']);
            }else{
                $data = [
                    'content' => $data['content'],
                    'content_err' => $data['content_err'],
                    'product_id' => $data['product_id'],
                ];
                $this->view('product/product',$data);
            }
        }
    }
}