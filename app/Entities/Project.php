<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Project
 * @package App\Entities
 */
class Project extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'client_id',
        'name',
        'progress',
        'status',
        'description',
        'due_date',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany(ProjectNote::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
    }
}
