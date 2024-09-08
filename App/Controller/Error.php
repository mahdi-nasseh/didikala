<?php

namespace Didikala\Controller;

use Didikala\Lib\Controller;

class Error extends Controller
{
    public function index(){
        $this->view('error/404');
    }
}