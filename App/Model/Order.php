<?php

namespace Didikala\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 protected $table = 'orders';

 protected $primaryKey = 'ID';
 public function users(){
     return $this->belongsTo(User::class,'user_id');
 }
 public function order_items(){
     return $this->hasMany(Order_items::class);
 }
}