<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientImport;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function verif()
    {
        $verif = User::where('verif', 'unverified')->get();
        return view('Account.verif', compact('verif'));
    }
    public function verif_store(Request $request)
    {
        $dataRequest = $request -> validate([
			'verif'=> ['required'],

		]);

        $user = User::find($request->id);
        $user->verif = $dataRequest['verif'];
        $user->update();
        return redireact('/account-unverified');
    }
    public function profile()
    {
       return view('Account.profile');
    }
    public function upload(request $request)
    {
        $id = Auth::user()->id;
        $data = $request -> validate([
			'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
		]);
        $file_image = 'images';
        $data['image']->move($file_image, $data['image']->getClientOriginalName());
		$file_name_image = $data['image']->getClientOriginalName();

        $user = User::find($id);
        $user->image = $file_name_image;
        $user->save();

        return redirect('/profile');
    }
}

