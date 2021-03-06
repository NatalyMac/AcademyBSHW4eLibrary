<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
}
