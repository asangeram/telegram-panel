<?php

namespace Nordal\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/348713440:AAGCWT2FoQ4Kg3HAHjkn9rdLKdNZiseT7CI/webhook'
    ];
}
