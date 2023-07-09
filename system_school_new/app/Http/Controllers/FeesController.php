<?php

namespace App\Http\Controllers;

use App\Models\fees;
use Illuminate\Http\Request;
use App\Repository\FeesRepositoryinterface;
use App\Http\Requests\feesRequest;
use App\Models\Grate;
use App\Repository\fess;

class FeesController extends Controller
{
    public $fees;
    public function __construct(FeesRepositoryinterface $fees)
    {
        $this->fees=$fees;
    }
    public function index()
    {
       return $this->fees->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->fees->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(feesRequest $request)
    {
       return $this->fees->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(fees $fees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Grades=Grate::all();
        $fee=fees::findOrfail($id);
        return view('pages.Fees.edit',compact('fee','Grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(feesRequest $request)
    {
       return $this->fees->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       fees::destroy($request->id);
       toastr()->error('errors','messages.Delete');
       return redirect()->back();
    }
}
