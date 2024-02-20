<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\Services\GuestUserService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestUser
{
    public function __construct(protected GuestUserService $guestUserService) {
    }

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $ipAddress = $request->ip();
        $guestUser = $this->guestUserService->getAccount($ipAddress);

        Auth::login($guestUser);

        return $next($request);
    }
}
