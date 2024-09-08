<?php

namespace Didikala\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'ID';


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function signup($email, $username, $pass)
    {
        $this->attributes['email'] = $email;
        $this->attributes['username'] = $username;
        $this->attributes['password'] = password_hash($pass, PASSWORD_DEFAULT);
        $this->save();
    }

    public function getFullName()
    {
        if (empty($this->attributes['name']) || empty($this->attributes['family'])) {
            return '-';
        } else {
            return $this->attributes['name'] . ' ' . $this->attributes['family'];
        }
    }

    public function getFullAddress(){
        if (empty($this->attributes['country']) && empty($this->attributes['state']) && empty($this->attributes['city']) && empty($this->attributes['address'])) {
            return null;
        }else{
            return $this->attributes['country'] . '_' . $this->attributes['state'] . '_' . $this->attributes['city'] . '_' . $this->attributes['address'];
        }
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}