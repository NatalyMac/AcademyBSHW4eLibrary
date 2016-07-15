<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>
<div class="container">

  <nav class="navbar navbar-inverse">
    <ul class = "nav navbar-nav">
       <li><a href= "{{ URL::to('users') }}"> View all users</a></li>
       <li><a href= "{{ URL::to('users/create') }}"> Create a user</a></li>
        <li><a href= "{{ URL::to('books') }}"> View all books</a></li>
        <li><a href= "{{ URL::to('books/create') }}"> Create a book</a></li>

    </ul>
  </nav>

<h1> @yield('pagetitle')</h1>

    @if (Session::has('message'))
        <div class = "alert alert-info">{{ Session::get('message') }}</div>
    @endif

@yield('content')

</div>
</body>
</html>

