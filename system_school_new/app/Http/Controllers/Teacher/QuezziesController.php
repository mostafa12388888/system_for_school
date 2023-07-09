<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Quizze;
use Illuminate\Http\Request;
use App\Repository\teacherqueziesInterface;

class QuezziesController extends Controller
{
    public $quezes;
    public function __construct(teacherqueziesInterface $quezes)
    {
        $this->quezes=$quezes;
    }
    public function index()
    {
        return $this->quezes->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return $this->quezes->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $quizzes = new Quizze();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->Grade_id;
            $quizzes->classroom_id = $request->Classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = auth()->user()->id;
            $quizzes->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('quizzes.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return$this->quezes->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->quezes->edite($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->quezes->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       return $this->quezes->desrtroy($request);
    }
    public function getDataclass($id){
     
        return $this->quezes->getDataclass($id);
    }
    public function getdatasection($id){
        return $this->quezes->getdatasection($id) ;
    }
    public function Degre_student($id){
      $degrees=Degree::Where('quizze_id',$id)->get();
    //   dd( $id);
      return view('pages.teachers.Student.Quizzes.student_quizze',compact('degrees'));
    }
    public function repeat_quizze(Request $request){
      $degrees=Degree::where('quizze_id',$request->quizze_id)->where('student_id',$request->student_id)->delete();
    toastr()->success('تم استرجاع البينات بنجاح');
      return redirect()->back();
    }
}
