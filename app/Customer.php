<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function userName(){
        return $this->hasOne('App\User','id','user_id');
    }

    public function bookName(){
        return $this->hasOne('App\Inventory','id','book_id');
    }

}
