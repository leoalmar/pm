<?php
/**
 * Created by PhpStorm.
 * User: leoalmar
 * Date: 05/11/16
 * Time: 23:39
 */

namespace App\Services;


use App\Repositories\ProjectRepository;
use App\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class ProjectService
 * @package App\Services
 */
class ProjectService
{

    /**
     * @var ProjectRepository
     */
    protected $repository;


    /**
     * @var ProjectValidator
     */
    protected $validator;


    /**
     * ProjectService constructor.
     * @param ProjectRepository $repository
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }
        catch(ValidatorException $e)
        {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        try
        {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }
        catch(ValidatorException $e)
        {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
}