<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientMaintenanceMode
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
        $dbMaintenance = \App\Models\Settings::where('key', 'maintenance_mode')->value('value') === 'true';

        if ($dbMaintenance) {
            // Allow access to admin panel, login, and simple captchas provided by mews/captcha if used, or storage
            if ($request->is('admin/*') || $request->is('admin') || $request->is('login') || $request->is('logout')) {
                return $next($request);
            }

            return response()->view('errors.maintenance', [], 503);
        }

        return $next($request);
    }
}