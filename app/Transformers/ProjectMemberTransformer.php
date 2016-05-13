<?php

namespace App\Transformers;

use App\Entities\User;
use League\Fractal\TransformerAbstract;
use App\Entities\ProjectMember;

/**
 * Class ProjectMemberTransformer
 * @package namespace App\Transformers;
 */
class ProjectMemberTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProjectMember entity
     * @param User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,

            /* place your other model properties here */

            //'created_at' => $model->created_at,
            //'updated_at' => $model->updated_at
        ];
    }
}
