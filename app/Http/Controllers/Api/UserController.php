<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function user_logged($id) {
        $user = User::where('id', $id)->first();

        return response()->json($user);
    }
}
