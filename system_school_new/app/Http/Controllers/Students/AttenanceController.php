<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\AttedanceRepositoryInterface;
class AttenanceController extends Controller
{
    public $attendence;
    public function __construct(AttedanceRepositoryInterface $attendence)
    {
     $this->attendence=$attendence;   
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  $this->attendence->index();
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->attendence->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        return  $this->attendence->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return  $this->attendence->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return  $this->attendence->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return  $this->attendence->destroy($request);
    }
}
