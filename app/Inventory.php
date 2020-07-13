<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function Author(){
        return $this->hasOne('App\Inventory', 'id', 'ref_id');
    }
}
