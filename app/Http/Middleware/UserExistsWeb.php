<?php

namespace App\Http\Middleware;

use Closure;

require_once(app_path() . '/Http/Controllers/helpers/web/authorization/index.php');

class UserExistsWeb
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->is_removed === 0) {
            return $next($request);
        }

        $isLogout = DB_tryLogoutUser($request);

        if($isLogout) {
            return redirect('/');
        }

        return abort(500);
    }
}
