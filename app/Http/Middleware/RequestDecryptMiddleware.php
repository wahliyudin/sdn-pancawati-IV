<?php

namespace App\Http\Middleware;

use App\Traits\EncryptTrait;
use Closure;
use Illuminate\Http\Request;

class RequestDecryptMiddleware
{
    use EncryptTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('name')) {
            $request->merge(['name' => $this->encrypt($request->get('name'), env('PASSWORD_ENCRYPT'))]);
        }

        return $next($request);
    }

}
