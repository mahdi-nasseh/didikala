<?php

namespace Didikala\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'ID';

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function is_liked_by($user_id)
    {
        return $this->likes()->where('user_id', '=', $user_id)->exists();
    }

    public function like($user_id)
    {
        return $this->likes()->create(['user_id' => $user_id]);
    }

    public function unlike($user_id)
    {
        return $this->likes()->where('user_id', '=', $user_id)->delete();
    }

    public function has_discount()
    {
        if ($this->attributes['discount_percent'] > 0 && $this->attributes['discount_date'] > date('Y-m-d')) {
            return true;
        } else {
            return false;
        }
    }

    public function get_price()
    {
        if ($this->has_discount()) {
            return (100 - $this->attributes['discount_percent']) * $this->attributes['price'] / 100;
        } else {
            return $this->attributes['price'];
        }
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}