<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProjectRepository;
use App\Entities\Project;
use App\Validators\ProjectValidator;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProjectValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function isOwner($id, $userId)
    {
        if( $this->findWhere(['id' => $id, 'owner_id' => $userId])->first() ){
            return true;
        }
        
        return false;
    }

    public function isMember($id, $userId)
    {
        $project = $this->find($id);

        if( $project->members->contains($userId) ){
            return true;
        }

        return false;
    }
}
