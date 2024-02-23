<?php
 
namespace App\Exceptions;
 
use App\Enums\GuestUserEnum;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
 
class MaxRequestLimitException extends Exception
{
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json(
            ['error' => 'You\'ve reached your daily limit of ' . GuestUserEnum::MAX_REQUEST_LIMIT->value . ' requests'],
            429
        );
    }
}
