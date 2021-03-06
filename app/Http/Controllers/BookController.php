<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Book;


class BookController extends Controller
{
    public function index()
    {
        //$books=Book::paginate(10);
        $books = Book::bookHolder1()->paginate(10);
       
        return view('book/index',['books'=>$books]);
    }

    public function create()
    {
        return view('book/create');
    }

    public function store(Request $request)
    {
        $rules = ['genre'  => 'required|alpha',
                  'author' => 'required|alpha',
                  'title'  => 'required',
                  'year'   => 'required|numeric',];

        $this->validate($request, $rules);

        $book = new Book();
        $book->genre = $request->genre;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;

        $book->save();

        Session::flash('message', 'Successfully created book ID'.$book->id." ".$book->title);

        return (Redirect::to('books'));
    }

    public function show($id)
    {
        $user = null;
        $book = Book::find($id);

        if ($book->lends()->whereNull('date_getin_fact')->first()) {
            $user = $book->lends()->whereNull('date_getin_fact')->first()->user()->first();
        }

        return view('book/show',['book'=>$book, 'user'=>$user ]);
    }

    public function edit($id)
    {
        $book = Book::find($id);
        
        return view('book/edit',['book'=>$book]);
    }

    public function update(Request $request, $id)
    {
        $rules = ['genre'  => 'required|alpha',
                  'author' => 'required|alpha',
                  'title'  => 'required',
                  'year'   => 'required|numeric',];

        $this->validate($request, $rules);

        $book = Book::find($id);
        $book->genre = $request->genre;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;

        $book->save();

        Session::flash('message', 'Successfully updated bookID'.$book->id." ".$book->title);

        return (Redirect::to('books'));
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        
        Session::flash('message', 'Successfully deleted book ID'.$book->id." ".$book->title);

        return (Redirect::to('books'));
    }

}
