<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Entities\Client;

/**
 * Class ClientController
 * @package App\Http\Controllers
 */
class ClientController extends Controller
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return  Client::all();
    }

    /**
     * @param Request $request
     * @return static
     */
    public function store(Request $request)
    {
        return Client::create($request->all());
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        return $client = Client::find($id)->update($request->all());
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
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return Client::destroy($id);
    }
}
