<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Libraries\AuthenticatorLibrary;
use App\Models\User;

class Authenticator {
   
    public function handle(Request $request, Closure $next) {

        $authToken = Session::get('auth_token');

        if (empty($authToken))
            return $this->redirectToLogin($request);

        $data = AuthenticatorLibrary::decodeToken($authToken);

        $row = User::where('user', $data['user'])->first();

        $result = $data['pass'] == $row->pass;

        if (!$result)
            return $this->redirectToLogin($request);

        return $next($request);

    }

    private function redirectToLogin(Request $request) {

        Session::forget('auth_token');
        
        return redirect()->action('AuthorizationController@index');

    }

}
