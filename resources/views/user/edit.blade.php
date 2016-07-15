@extends('vendor/app')

@section('pagetitle')
    Edit User
@stop

@section('content')

    {!! HTML::ul($errors->all()) !!}


    {!!  Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'PUT'])  !!}

    <div class ="form-group">
        {!!  Form::label('firstname', 'FirstName') !!}
        {!!  Form::text('firstname', null, ['class'=>'form-control']) !!}

    </div>

    <div class ="form-group">

        {!!  Form::label('lastname', 'LastName') !!}
        {!!  Form::text('lastname', null, ['class'=>'form-control']) !!}

    </div>

    <div class ="form-group">

        {!!  Form::label('email', 'Email') !!}
        {!!  Form::text('email', null, ['class'=>'form-control']) !!}

    </div>

    <div class ="form-group">

        {!!  Form::label('role', 'Role') !!}
        {!!  Form::select('role', ['reader'=>'reader', 'worker'=>'worker', 'admin'=>'admin'], null)!!}

    </div>

    {!!  Form::submit('Update',['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

@stop