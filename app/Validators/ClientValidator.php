<?php
/**
 * Created by PhpStorm.
 * User: leoalmar
 * Date: 05/12/16
 * Time: 00:16
 */

namespace App\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
    ];
}