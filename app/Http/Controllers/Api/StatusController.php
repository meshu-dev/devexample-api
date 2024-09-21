<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuestUserResource;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function getCurrentGuestUser(Request $request): GuestUserResource
    {
        return new GuestUserResource($request->user());
    }
}
