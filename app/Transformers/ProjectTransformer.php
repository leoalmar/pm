<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Project;

/**
 * Class ProjectTransformer
 * @package namespace App\Transformers;
 */
class ProjectTransformer extends TransformerAbstract
{


    protected $defaultIncludes = ['members'];

    /**
     * Transform the \Project entity
     * @param \Project $model
     *
     * @return array
     */
    public function transform(Project $model)
    {
        return [
            'id'         => (int) $model->id,
            'owner_id'   => (int) $model->owner_id,
            'name'       => $model->name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new ProjectMemberTransformer());
    }
}