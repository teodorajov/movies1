<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response('No such user', 400);
        }
        return response($user->createToken($user->email)->plainTextToken);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    }
    public function register(Request $req)
    {
        $user = User::where("email", $req->email)->first();
        if ($user) {
            return response()->json([
                "error" => "User with given email already exist"
            ], 400);
        }
        try {
            $user = User::create([
                "name" => $req->name,
                "email" => $req->email,
                "password" => Hash::make($req->password),
            ]);
            return $user->createToken($user->email)->plainTextToken;
        } catch (Exception $ex) {
            return response()->json([
                "error" => $ex->getMessage()
            ], 500);
        }
    }
}
