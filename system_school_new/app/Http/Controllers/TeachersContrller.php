<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\teachersRepositoryInterface;
use App\Http\Requests\teacherValidate;
use App\Models\teacher;

class TeachersContrller extends Controller
{
    protected $Teacher;
    public function __construct(teachersRepositoryInterface $teacher)
    {
        $this->Teacher=$teacher;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return 'oo';
      $Teachers=  $this->Teacher->getAllteachers();
       return view('pages.teachers.teachers',compact('Teachers')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders=$this->Teacher->getAllgender();
      $specializations=  $this->Teacher->getAllsections();
       return view('pages.teachers.create',compact('specializations','genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(teacherValidate $request)
    {
        
        $this->Teacher->setTeacher($request);
        return redirect()->route('teachers-for-school.index');
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
    public function edit($id)
    {
        $Teachers=teacher::findOrfail($id);
        $genders=$this->Teacher->getAllgender();
        $specializations=  $this->Teacher->getAllsections();
        return view('pages.teachers.edit',compact('Teachers','genders','specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(teacherValidate $request,$id)
    {
        $this->Teacher->setUpdate($request);
        return redirect()->route('teachers-for-school.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        teacher::findOrFail($request->id)->delete();
        toastr()->error('errors','messages.Delete');
       return back();
    }
}
