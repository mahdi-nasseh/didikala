<?php

namespace Didikala\Model;

use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    protected $table = 'order_items';

    protected $primaryKey = 'ID';

    protected $fillable = [
        'order_id',
        'product_id',
        'qantity',
        'price',
        'sale_price',
        'created_at'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function get_total_price(){
        return $this->attributes['price'] * $this->attributes['qantity'];
    }

    public function get_total_sale_price(){
        return $this->attributes['sale_price'] * $this->attributes['qantity'];
    }

    public function get_discount_percent(){
        return ($this->get_total_price() - $this->get_total_sale_price()) / $this->get_total_price() * 100;
    }
}