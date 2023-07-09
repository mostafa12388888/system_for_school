<?php 
namespace App\Repository;

use App\Models\Exame;

class ExameRepository implements ExameRepositoryInterface{
    public function index(){
        $exams=Exame::all();
return view('pages.Exames.index',compact('exams'));
    }
    public function show($id){
       
    }
    public function create(){
        return view('pages.Exames.create');
    }
    public function edit($id){
        $exam=Exame::findOrfail($id);
        return view('pages.Exames.edit',compact('exam'));
    }
    public function update($requiste){
        try{
        Exame::findOrfail($requiste->id)->update([
            'name'=>['ar'=>$requiste->Name_ar,'en'=>$requiste->Name_en],
            'term'=>$requiste->term,
            'academic_year'=>$requiste->academic_year,
        ]);
        toastr()->success(trans('mesages.Update'));
        return redirect()->route('Exams.index');}
        catch(\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
    public function store($requiste){
Exame::create([
    'name'=>['ar'=>$requiste->Name_ar,'en'=>$requiste->Name_en],
    'term'=>$requiste->term,
    'academic_year'=>$requiste->academic_year,
]);
toastr()->success(trans('mesages.success'));
return redirect()->route('Exams.index');
    }
    public function destroy($requiste){
        Exame::destroy($requiste->id);
        
toastr()->error(trans('mesages.Delete'));
return redirect()->back();
    }
}

