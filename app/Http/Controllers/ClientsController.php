<?php

namespace App\Http\Controllers;

use App\Entities\Client;
use App\Repositories\ClientRepository;
use App\Services\ClientService;
use Illuminate\Http\Request;


/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientsController extends Controller
{

    /**
     * @var ClientRepository
     */
    private $repository;

    /**
     * @var ClientService
     */
    private $service;

    public function __construct(ClientRepository $repository, ClientService $service)
    {

        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * @param Request $request
     * @return static
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return Client::find($id);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
    }
}
