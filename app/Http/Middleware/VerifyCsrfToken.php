<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = ['/operator/ticket/accept/{ticket}',
            //
    ];

//    public function handle($request, Closure $next) {
//        foreach ($this->excludeRoutes as $route) {
//            if ($request->is($route))
//                return $next($request);
//        }
//
//        return parent::handle($request, $next);
//    }

}
