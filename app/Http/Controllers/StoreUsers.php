<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;


class StoreUsers extends Controller
{
    public function store(RegisterUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'encrypted_master_key' => encrypt($request->input('master_password')),
                'phone_number' => $request->input('phone_number') ?? ''

            ]);

            DB::commit();

            session(['email' => $user->email]);

            return Response::json([
                'message' => "Account created Successfully! .Please verify your email",
            ], 201);

        } catch (\Exception $e) {
            DB::rollback();
            return Response::json([
                "message" => 'Server Error Occurred',
                "error" => $e->getMessage()
            ], HttpFoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
