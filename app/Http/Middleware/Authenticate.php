<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    public function logout($request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect($this->getRedirectTo());
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $user = Auth::user();
        if($user==null || $user->rol_id==3){
            return $request->expectsJson() ? null : route('login');
        }else{
            return $request->expectsJson() ? null : route('admin.login');
        }
        
    }
}
