<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'owner_id' => 'required|integer',
            'client_id' => 'required|integer',
            'name' => 'required',
            'progress' => 'required',
            'status' => 'required',
            'due_date' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'owner_id' => 'required|integer',
            'client_id' => 'required|integer',
            'name' => 'required',
            'progress' => 'required',
            'status' => 'required',
            'due_date' => 'required',
        ],
    ];

}