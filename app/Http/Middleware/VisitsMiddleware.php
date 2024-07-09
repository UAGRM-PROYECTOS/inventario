<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class VisitsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $page_name = Route::currentRouteName();
        $visit = Visit::where(['page_name' => $page_name])->first();
        if($visit != null){
            $visit->newVisit();
        }else{
            Visit::create(['page_name' => $page_name, 'cant' => 1]);
        }
        return $next($request);
    }
}
