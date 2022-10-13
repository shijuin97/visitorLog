<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class AdminAuthController extends Controller
{
    public function logIn(Request $request)
    {
        $admin = Admin::where('email', $request->email)->where('password', $request->password)->first();
        $is_exist = $admin ? true : false;

        if ($is_exist) {
            return response()->json(["email" => $admin->email, "role" => $admin->role], 200);
        } else {
            return response()->json(["message" => "Invalid Log In Credential!"], 404);
        }
    }
}
