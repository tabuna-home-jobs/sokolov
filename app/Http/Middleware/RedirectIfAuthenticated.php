<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            if ($this->auth->user()->checkRole('admin')) {
                return redirect('/dashboard');
            } elseif ($this->auth->user()->checkRole('editor')) {
                return redirect('/editor/chan');
            } else {
                return redirect('/order');
            }
        }

        return $next($request);
    }
}
