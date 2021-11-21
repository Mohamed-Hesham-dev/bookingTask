<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\API\Branch\BranchRequestStore;
use App\Http\Requests\API\Branch\BranchRequestUpdate;
use App\Http\Resources\API\Branch\BranchResource;
use App\Models\Branch;

class BranchController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Branch::get();
         
        return $this->sendResponse(BranchResource::collection($list), ' retrieved successfully.');

    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequestStore $request)
    {
        $branch = Branch::create($request->validated());
        return $this->sendResponse(new BranchResource($branch), 'created successfully.');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequestUpdate $request, Branch $branch)
    {
        $branch->update($request->validated());
        return $this->sendResponse(new BranchResource($branch), 'updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return $this->sendResponse('deleted', 'deleted successfully.');
    }
}
