<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\LibraryRebostoryInterface;
class LibrareController extends Controller
{
    public $librare;
    public function __construct(LibraryRebostoryInterface $librare)
    {
        $this->librare=$librare;
    }
    public function index()
    {
        return $this->librare->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

       return $this->librare->create();
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->librare->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->librare->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->librare->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->librare->destroy($request);
    }
    public function downloadAttachment($fileNmae){
        return $this->librare->download($fileNmae);
    }
}
