<?php

namespace Didikala\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'ID';
    protected $fillable = [
        'title'
    ];

    public function parents(){
        return $this->belongsTo(Category::class, 'parent','ID');
    }

    public function children(){
        return $this->hasMany(Category::class,'parent','ID');
    }

    public function posts(){
        return $this->belongsToMany(Product::class,'product_categories','category_id','product_id');
    }
}