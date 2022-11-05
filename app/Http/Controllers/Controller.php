<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toJson();
        }

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ])->assignRole('user');
        
        return response()->json([
            "status" => "success",
            "message" => "account created"
        ]);
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toJson();
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($credentials)) {
            
            return response()->json([
                "status" => "error",
                "message" => "Wrong login credentials"
            ]);
        }
        
        $user = $request->user();
        
        $tokenResult = $user->createToken('authToken');
        
        return response()->json([
            "status" => "success",
            "data" => $user->toArray(),
            "token" => $tokenResult->plainTextToken,
            "message" => "account created"
        ]);
    }

    public function getAllCitizens(Request $request){
        $citizens = Citizen::paginate(10);
        return response()->json([
            "status" => "success",
            "data" => $citizens->toArray(),
            "message" => "All Citizens"
        ]);
    }
}
