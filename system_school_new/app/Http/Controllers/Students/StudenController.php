<?php

namespace App\Http\Controllers\Students;
use App\Repository\studentsRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\http\Requests\studentValidate;
use App\Models\Student;
use App\Repository\students;
use Illuminate\Support\Facades\Storage;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

class StudenController extends Controller
{
   public  $student;
public function __construct(studentsRepositoryInterface $student)
{
    $this->student=$student;
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return $this->student->Get_Students();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->student->createSudent();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(studentValidate $request)
    {
       
       return $this->student->Store_Student($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->student->Show_Students($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return $this->student->edit_Students($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(studentValidate $request)
    {

        return $this->student->Update_Students($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       Student::findOrfail($request->id)->forceDelete();
    //    return $request;
    //    public_path(.$re->student_name)
    
    File::deleteDirectory(public_path('Attachment/Students/'.$request->name));
        toastr()->error(trans('messages.Delete'), 'Congrats');
       return back();

    }
    public function getDataclass($id){
        return $this->student->getDataclass($id);
    }
    public function getdatasection($id){
        return $this->student->getdatasection($id);
    }
    public function uploadeAttachment(Request $request){
     return   $this->student->uploadeAttachment($request);
    }
    public function DonloadAttachment($studentName,$FileName){
        return $this->student->DonloadAttachment1($studentName,$FileName);
    }
    public function Delete_attachment(Request $request){
        return $this->student->Delete_attachment($request);
    }
}
