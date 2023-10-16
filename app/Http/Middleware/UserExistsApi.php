<?php

namespace App\Http\Middleware;

use Closure;

require_once(app_path() . '/Http/Controllers/helpers/web/authorization/index.php');

class UserExistsApi
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->is_removed === 0) {
            return $next($request);
        }

        try {
            $request->user()->currentAccessToken()->delete();

            $data = [
                'data' => '',
                'errors' => '',
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        } catch(\Exception $err) {
            $data = [
                'data' => '',
                'errors' => [
                    'common' => $err->getMessage(),
                ],
            ];

            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
        }
    }
}
