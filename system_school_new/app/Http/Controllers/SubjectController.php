<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\subjectInterfaceRepository;
class SubjectController extends Controller
{
    public $subject;
    public function __construct(subjectInterfaceRepository $subject)
    {
        $this->subject=$subject;
    }
    public function index()
    {
        return $this->subject->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return $this->subject->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->subject->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->subject->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->subject->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->subject->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->subject->destroy($request);
    }
}
