<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Exceptions\CustomHttpException;
use Throwable;

class ExceptionHandlerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            return $next($request);
        } catch (CustomHttpException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], $e->getHttpCode());
        } catch (Throwable $e) {
            return response()->json([
                'error' => 'Internal Server Error',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
