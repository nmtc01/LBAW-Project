<?php

namespace App\Http\Middleware;

use Closure;

class CheckBannedOrDeleted
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->getUserCurrentRole() == 'banned') {
            auth()->logout();

            $message = 'Your account has been banned.';

            return redirect()->route('login')->withMessage($message);
        }
        else if (auth()->check() && auth()->user()->getUserCurrentRole() == 'deleted') {
            auth()->logout();

            $message = 'Your account has been deleted.';

            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}
