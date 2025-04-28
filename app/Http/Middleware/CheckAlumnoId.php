<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAlumnoId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = request()->route('id');
        if(!is_numeric($id) || $id <= 0){
            return response()->json(['message' => 'Bad Requesst'], 400);
        }
        return $next($request);
    }
}
