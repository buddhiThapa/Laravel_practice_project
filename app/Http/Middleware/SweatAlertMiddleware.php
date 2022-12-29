<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SweatAlertMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('success')) {
            alert()->success(session('success'))->toToast()->position('top-end')->timerProgressBar();
            // Alert::success(session('success'));
        } 
        if (session('error')) {
            alert()->error(session('error'))->toToast()->position('top-end')->timerProgressBar();
            // Alert::error(session('error'));
        }
        if (session('warning')) {
            alert()->warning(session('warning'))->toToast()->position('top-end')->timerProgressBar();
            // Alert::warning(session('warning'));
        }
        if (session('info')) {
            alert()->info(session('info'))->toToast()->position('top-end')->timerProgressBar();
            // Alert::info(session('info'));
        }
        if (session('question')) {
            alert()->question(session('question'))->toToast()->position('top-end')->timerProgressBar();
            // Alert::info(session('info'));
        }
        return $next($request);
    }
}
