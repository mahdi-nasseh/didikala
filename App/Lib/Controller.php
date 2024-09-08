<?php
namespace Didikala\Lib;

class Controller{
    //Load Model
    public function model($model){
        $model = "Didikala\\Model\\$model";
        return new $model();
    }

    //Load View
    public function view($view, $data = []){
        if (file_exists('../App/View/'.$view.'.php')){
            require '../App/View/'.$view.'.php';
        }else{
            die($view.' not found');
        }
    }

}
