@extends('vendor/app')

@section('pagetitle')
    Book List
@stop

@section('content')

    <table class="table table-hover table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Genre</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th> Action</th>
            <th>Hold on by</th>
        </tr>
        </thead>
        <tbody>

        @foreach($books as $book)
            <tr>
                <td> {{ $book->id}}</td>
                <td> {{ $book->genre}}</td>
                <td> {{ $book->title}}</td>
                <td> {{ $book->author}}</td>
                <td> {{ $book->year}}</td>

                <td width="390">
                    <a class=" btn btn-small btn-primary" href="{{ URL::to('books/'.$book->id) }}">Show this book </a>
                    <a class=" btn btn-small btn-success" href="{{ URL::to('books/'.$book->id.'/edit') }}">Edit this book </a>
                    {!!  Form::open (['url'=>['books/'.$book->id], 'class'=>'pull-right'])  !!}
                    {!!  Form::hidden('_method', 'DELETE')  !!}
                    {!!  Form::submit('Delete this book',['class'=>'btn btn-warning']) !!}
                    {!!  Form::close() !!}
                </td>

                @foreach($book->lends as $lend)
                    @if ($lend->date_getin_fact == null)
                         <td> {{$lend->user->firstname}} </td>
                    @endif
                @endforeach
                {{-- $book->lends()->whereNull('date_getin_fact')->first()->user  doesnt work, have broken my brain, just an array --}}

             </tr>
        @endforeach

      <div class="pagination">{{ $books->links() }}</div>
        </tbody>
    </table>
@stop