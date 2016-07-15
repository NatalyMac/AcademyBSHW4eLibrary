<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model

{
    public function lends()
    {
        return $this->hasMany('App\Lend');
    }

    public function bookUser()
    {
        $books = DB::table('books')->get();
        dd($books);
        //    ->join('lends', 'id', '=', 'lends.book_id')
        //    ->join('users', 'id', '=', 'lends.user_id')
    return $books;
    }
}
