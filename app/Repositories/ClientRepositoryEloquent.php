<?php
/**
 * Created by PhpStorm.
 * User: leoalmar
 * Date: 05/11/16
 * Time: 22:53
 */

namespace App\Repositories;


use App\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }
}