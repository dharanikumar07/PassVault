<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isVerifiedEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        info(Auth::user());
        if (Auth::user()->is_email_verified) {
            return redirect()->route('login')
                ->with('message', 'You already verifed , proceed to login');
        }
        return $next($request);
    }
}
