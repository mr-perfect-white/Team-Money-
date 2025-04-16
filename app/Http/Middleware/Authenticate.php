<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate{
    

public function handle($request, Closure $next, ...$guards)
{
    if (empty($guards)) {
        $guards = [null];
    }

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            if ($guard === 'admin') {
                config(['session.cookie' => 'admin_session']);
            } else {
                config(['session.cookie' => 'member_session']);
            }
            return $next($request);
        }
    }

   
    return $this->redirectToLogin($request, $guards);
}

protected function redirectToLogin($request, $guards)
{
    if (in_array('admin', $guards)) {
        return redirect()->route('admin.login'); 
    }

    return redirect()->route('member.login'); 
}

}