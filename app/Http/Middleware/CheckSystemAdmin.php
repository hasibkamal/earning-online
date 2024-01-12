<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckSystemAdmin
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
        $authUserType = auth()->user()->user_type ?? null;
        if (!in_array($authUserType,['1x101','2x201','2x202','3x303','4x404','5x505','6x606'])) {
            Session::flash('error', 'Invalid URL ! This incident will be reported.');
            return redirect('dashboard');
        }
        return $next($request);
    }
}
