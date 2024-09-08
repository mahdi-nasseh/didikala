<?php

namespace Didikala\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'content',
        'user_id',
        'product_id',
        'parent',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','ID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent');
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent');
    }
}