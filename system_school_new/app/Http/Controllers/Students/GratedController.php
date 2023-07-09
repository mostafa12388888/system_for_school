<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Grate;
use Illuminate\Http\Request;
use App\Repository\StudentGrateRepositoryInterface;
class GratedController extends Controller
{
    public $Grate;
    public function __construct(StudentGrateRepositoryInterface $Grate)
    {
        $this->Grate=$Grate;
        
    }
    public function index()
    {
        return $this->Grate->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Grate->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Grate->store($request);
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
    public function edit( $id)
    {
        $Grades=Grate::all();
        return view('pages.Students.Graduated.create_for_one_student',compact('Grades','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       return $this->Grate->restoredate($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Grate->destroy($request);
    }
    public function promotion_student(Request $request){
return $this->Grate->promotion_student($request);
    }
   public function graduate_student($id){
    // return $id;
 return $this->Grate->graduate_student($id);
     }
}
