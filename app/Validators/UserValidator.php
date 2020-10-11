<?php
namespace App\Validators;

use App\Traits\ValidatorTrait;
use Validator;

class UserValidator
{
    use ValidatorTrait;

    public function validate(array &$data): bool
    {
        $rules = [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users'
        ];

        $this->validator = Validator::make($data, $rules);
        return $this->isValid();
    }
}
