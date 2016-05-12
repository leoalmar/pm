<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'project_id' => 'required|integer',
            'title' => 'required',
            'note' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'project_id' => 'required|integer',
            'title' => 'required',
            'note' => 'required',
        ],
   ];

}