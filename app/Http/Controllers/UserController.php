<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function userRegister(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required',
            'phone' => 'required|max:10',
            'password' => 'required|min:8'

        ]);
        if ($validation->fails()) {
            return [
                'status' => 'fails',
                'errors' => $validation->getMessageBag()->toArray()
            ];
        }
        $input = $request->all();

        $user = User::create([
            'name' => $input['name'],
            'role' => 'customer',
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'phone' => $input['phone']
        ]);

        return [
            'status' => 'success',
            'message' => 'user registered successfully',
            'data-url' => url('message')
        ];
    }
}
