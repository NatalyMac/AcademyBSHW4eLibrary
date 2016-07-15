<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('user/index',['users'=>$users]);
    }

    public function create()
    {
        return view('user/create');
    }

    public function store(Request $request)
    {
        $rules = ['firstname' => 'required|alpha',
                  'lastname'  => 'required|alpha',
                  'email'     => 'required|email|unique:users',
                  'password'  => 'required',
                  'role'      => 'required'];

        $this->validate($request, $rules);
        
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;

        $user->save();
        
        Session::flash('message', "Successfully created user ID".$user->id." ".$user->firstname);
        
            return (Redirect::to('users'));
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user/show',['user'=>$user]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user/edit',['user'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $rules = ['firstname' => 'required|alpha',
                  'lastname'  => 'required|alpha',
                  'email'     => 'required|email|unique:users',
                  'role'      => 'required'];

        $this->validate($request, $rules);

        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        Session::flash('message', "Successfully updated user ID".$user->id." ".$user->firstname);

        return (Redirect::to('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('message', "Successfully deleted user ID".$user->id." ".$user->firstname);

        return (Redirect::to('users'));
    }
}
