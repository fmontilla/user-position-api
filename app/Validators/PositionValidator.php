<?php
namespace App\Validators;

use App\Traits\ValidatorTrait;
use Validator;

class PositionValidator
{
    use ValidatorTrait;

    public function validate(array $data, $id = null): bool
    {
        if ($id) {
            $rules = [
                'user_id' => 'required|exists:App\Models\User,id'
            ];
        } else {
            $rules = [
                'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
                'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
                'user_id' => 'required|exists:App\Models\User,id'
            ];
        }

        $this->validator = Validator::make($data, $rules);
        return $this->isValid();
    }
}
