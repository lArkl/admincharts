<?php

namespace App\Http\Controllers;

use App\User;
use App\PersonalInformation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();//::paginate(8)->all();
        //->unique('document_number');
        return view('users.index') -> with('users', $users);
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->names = $request->names;
        $user->last_names = $request->last_names;
        $user->dni = $request->dni;
        $user->save();
        return redirect()->action('UserController@index');
    }

    public function show(User $user)
    {
        $found_user = User::where('id', $user->id)->first();
        return view('users.show')->with('user', $found_user);
    }

    public function edit(User $user)
    {
        $found_information = PersonalInformation::where('id', $user->id)->first();
        return view('users.edit')->with('information', $found_information);
    }

    public function update(Request $request, $user_id)
    {
        $found_information = PersonalInformation::where('user_id', $user_id)->first();
        $found_information->first_name = $request->first_name;
        $found_information->middle_name = $request->middle_name;
    	$found_information->first_surname = $request->first_surname;
        $found_information->second_surname = $request->second_surname;
        $found_information->document_type = $request->document_type;
        $found_information->document_number = $request->document_number;
        $found_information->birthdate = $request->birthdate;
        $found_information->phone = $request->phone;
        $found_information->email = $request->email;
        $found_information->save();
        return redirect()->action('UserController@index');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect()->action('UserController@index');
    }
}