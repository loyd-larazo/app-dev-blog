<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function test() {
        return response()->json([ 'data' => 'hello world' ]);
    }

    public function login(Request $request) {
        $username = $request->get('username');
        $password = $request->get('password');
    }

    public function logout() {
        
    }

    public function register(Request $request) {
        $username = $request->get('username');
        $password = $request->get('password');
        $firstname = $request->get('firstname');
        $lastname = $request->get('lastname');

        $user = User::create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'username' => $username,
            'password' => app('hash')->make($password),
        ]);

        return response()->json([ 'data' => $user ]);
    }

    public function users(Request $request) {
        $users = User::get();
        return response()->json([ 'data' => $users ]);
    }
}
