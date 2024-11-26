<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;

class LogSessionDetails
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   /*  public function handle(Request $request, Closure $next): Response
    {
          // استدعاء مكتبة Agent لتحليل المعلومات المتعلقة بالمستخدم
        //   $agent = new Agent();

          // تسجيل التفاصيل في الجلسة
        //   Session::put('ip_address', $request->ip());
        //   Session::put('user_agent', $request->header('User-Agent'));
        //   Session::put('device', $agent->device());
        //   Session::put('platform', $agent->platform());
        //   Session::put('browser', $agent->browser());
          
        // return $next($request);
    } */
}
