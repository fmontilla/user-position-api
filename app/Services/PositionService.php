<?php
namespace App\Services;

use App\Exceptions\ValidatorException;
use App\Repositories\PositionRepository;
use App\Validators\PositionValidator;

class PositionService
{
    private $validator;
    private $repository;

    public function __construct(PositionValidator $validator, PositionRepository $repository)
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public function get(int $user_id)
    {
        if (!$this->validator->validate(['user_id' => $user_id], $user_id)) {
            throw new ValidatorException($this->validator->getErrors());
        }

        return $this->repository->findByField('user_id', $user_id);
    }

    public function save(array $data)
    {
        if (!$this->validator->validate($data)) {
            throw new ValidatorException($this->validator->getErrors());
        }

        return $this->repository->create($data);
    }
}
