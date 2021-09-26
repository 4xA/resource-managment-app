<?php

namespace App\Http\Controllers;

use App\Services\ResourceService;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function __construct(
        protected ResourceService $resourceService
    )
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('visitor.resources.index', [
            'resources' => $this->resourceService->all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('visitor.resources.show', [
            'resource' => $this->resourceService->retrieve($id)
        ]);
    }
}
