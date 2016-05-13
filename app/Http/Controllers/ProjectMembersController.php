<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProjectMemberCreateRequest;
use App\Http\Requests\ProjectMemberUpdateRequest;
use App\Repositories\ProjectMemberRepository;
use App\Validators\ProjectMemberValidator;


class ProjectMembersController extends Controller
{

    /**
     * @var ProjectMemberRepository
     */
    protected $repository;

    /**
     * @var ProjectMemberValidator
     */
    protected $validator;


    public function __construct(ProjectMemberRepository $repository, ProjectMemberValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $projectMembers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectMembers,
            ]);
        }

        return view('projectMembers.index', compact('projectMembers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('projectMembers.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectMemberCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectMemberCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $projectMember = $this->repository->create($request->all());

            $response = [
                'message' => 'ProjectMember created.',
                'data'    => $projectMember->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectMember = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectMember,
            ]);
        }

        return view('projectMembers.show', compact('projectMember'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $projectMember = $this->repository->find($id);

        return view('projectMembers.edit', compact('projectMember'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectMemberUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProjectMemberUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $projectMember = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProjectMember updated.',
                'data'    => $projectMember->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'ProjectMember deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProjectMember deleted.');
    }
}
