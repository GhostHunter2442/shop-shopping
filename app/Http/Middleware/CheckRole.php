<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && $request->user()->userrole == 'admin') {
            return $next($request);
        }

        abort('403','คุณไม่มีสิทธิเข้าใช้งานหน้านี้ เฉพาะ admin เท่านั้น');
    }
}
