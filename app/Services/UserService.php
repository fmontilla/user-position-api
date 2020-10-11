<?php
namespace App\Services;

use App\Exceptions\ValidatorException;
use App\Http\Controllers\Api\AuthController;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Jrean\UserVerification\UserVerification;

class UserService
{
    private $validator;
    private $repository;

    public function __construct(UserValidator $validator, UserRepository $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function get($id)
    {
        if (!$id) {
            $id = auth()->user()->id;
        }

        return $this->repository->search(['id' => $id]);
    }

    public function save(array $data)
    {
        if (!$this->validator->validate($data)) {
            throw new ValidatorException($this->validator->getErrors());
        }

        return $this->repository->create($data);
    }
}
