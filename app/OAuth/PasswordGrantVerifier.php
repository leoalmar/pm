<?php
/**
 * Created by PhpStorm.
 * User: imac
 * Date: 5/12/16
 * Time: 16:24
 */

namespace App\OAuth;

use Auth;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}