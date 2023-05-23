<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Account.register');
    }
    public function register(Request $request)
    {
        $user = User::get()->count();
        $verif = 'unverified';
        $role = 'operator';
        $validateData = $request -> validate([
			'name'=> ['required','max:300'],
			'email' =>['required', 'email:dns', 'unique:users'],
			'password'=>'required|min:8|max:300',
		]);
        $validateData['password'] = Hash::make($validateData['password']);
        $data = [
           'name'=> $validateData['name'],
           'email'=> $validateData['email'],
           'password'=> $validateData['password'],
           'verif'=> $verif,
           'role'=> $role,
        ];
        if($user < 1){
            $data['verif'] = 'verified';
            $data['role'] = 'admin';
        }
        User::create($data);
        return redirect('/login');
    }
}
