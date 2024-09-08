<?php

namespace Didikala\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    protected $fillable = ['user_id', 'likeable_id'];
    public function likeable(){
        return $this->morphTo();
    }


}