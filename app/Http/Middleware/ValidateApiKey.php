<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $apiKey = env('API_KEY_BOOKING');

        if ($request->header('X-API-KEY') !== $apiKey) {
            return response()->json(['error' => 'Invalid API Key'], 401);
        }

        return $next($request);
    }
}
