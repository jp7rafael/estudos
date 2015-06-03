<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfSa {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->user()->sa())
		{	
			return $next($request);
		}

		return redirect ('/');
	}

}
