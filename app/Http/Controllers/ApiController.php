<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mockery\Expectation;
use Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use function PHPUnit\Framework\throwException;

class ApiController extends Controller
{
    public function sendVerifyEmail(Request $request)
    {
        try {
            $email = session('email');

            $user = User::where('email', $email)->first();
            $token = Str::uuid();

            $user->token = $token;
            $user->save();

            $link = env('APP_URL') . "/account/verify/{$token}";
            Mail::send('email-verification', ['token' => $token, 'verification_link' => $link], function ($message) use ($user) {
                $message->to($user->email);
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $message->subject('Email Verification Mail By PassVault');
            });
            return Response::json([
                'message' => 'Send verification email',
                'redirect_url' => true
            ], HttpFoundationResponse::HTTP_OK);

        } catch (\Exception $e) {
            return Response::json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], HttpFoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function verifyUser($token)
    {
        try {
            $message = "Token is not found";

            if (!empty($token)) {

                $user = User::where('token', $token)->first();

                if (!$user) {
                    $message = "User is not found";
                }
                $user->email_verified_at = now();
                $user->is_verified = true;
                $user->save();

                $message = "Email Verified successfully! Now you login";
            }
            return Response::json([
                "message" => $message
            ], HttpFoundationResponse::HTTP_OK);

        } catch (\Exception $e) {
            return Response::json([
                "message" => $message,
                "error" => $e->getMessage()
            ], HttpFoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::where('email', $request->email)->first();


            if (!$user || !Hash::check($request->password, $user->password)) {
                return Response::json([
                    "message" => "Invalid Crendtials."
                ], HttpFoundationResponse::HTTP_UNAUTHORIZED);
            }

            if (!$user->is_verified) {
                return Response::json([
                    "message" => "Email not verified. Please verify your email."
                ], HttpFoundationResponse::HTTP_UNAUTHORIZED);
            }

            return Response::json([
                "message" => "Login Successfully"
            ], HttpFoundationResponse::HTTP_OK);

        } catch (\Exception $e) {
            return Response::json([
                "message" => "Something went wrong",
                "error" => $e->getMessage()
            ], HttpFoundationResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
