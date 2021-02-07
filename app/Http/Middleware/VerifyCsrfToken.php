<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/*'
    ];

    protected function tokensMatch($request)
    {
        $token = $request->session()->token();

        $header = $request->header('X-XSRF-TOKEN');

        $cookie = $request->cookie('XSRF-TOKEN');

        return StringUtils::equals($token, $request->input('_token')) ||
            ($header && StringUtils::equals($token, $this->encrypter->decrypt($header))) ||
            ($cookie && StringUtils::equals($token, $cookie));
    }
}
