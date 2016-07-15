<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function lends()
    {
        return $this->hasMany('App\Lend');
    }
    
}
