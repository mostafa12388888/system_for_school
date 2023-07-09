<?php 
namespace App\Repository;
use App\Http\Traits\UploadAtchhment;
use App\Models\Grate;
use App\Models\Library;
use Illuminate\Support\Facades\Storage;

class LibraryRebostory implements LibraryRebostoryInterface{
    use UploadAtchhment;
    public function index(){
$books=Library::get();
return view('pages.library.index',compact('books'));
    }

    public function create(){
$grades=Grate::all();
return view('pages.library.create',compact('grades'));
    }

    public function store($request){
        try{
        $library=new Library();
        $library->file_name=$request->file('file_name')->getClientOriginalName();
        $library->Classrom_id=$request->Classroom_id;
        $library->section_id=$request->section_id;
        $library->Grade_id=$request->Grade_id;
        $library->teacher_id=1;
        $library->title=$request->title;
        $library->save();
        $this->uploaddeFile($request,'file_name','Library');
        return redirect()->route('library.index');
        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function edit($id){
        $grades=Grate::all();
        $book=Library::findOrfail($id);
        return view('pages.library.edite',compact('grades','book'));
    }

    public function update($request){
        try{
            $library=Library::findOrfail($request->id);
          
            if($request->hasfile($request->file_name)){
           
            $this->DeleteFile($library->file_name,'Library');

            $this->uploaddeFile($request,'file_name','Library');

            $library->file_name=$request->file('file_name')->getClientOriginalName();
        }
       
            $library->Classrom_id=$request->Classroom_id;
            $library->section_id=$request->section_id;
            $library->Grade_id=$request->Grade_id;
            
            $library->title=$request->title;
            $library->save();
           
            return redirect()->route('library.index');
            }catch(\Exception $e){
                return redirect()->back()->with(['error'=>$e->getMessage()]);
            }
    }

    public function destroy($request){
        try{
            $this->DeleteFile($request->file_name,'Library');
Library::destroy($request->id);
toastr()->error(trans('messages.Delete'));
return back();
        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function download($filename){
       
if(Storage::disk('upload_attachments')->exists('upload_attachments/Library'.$filename))
        return response()->download(public_path('upload_attachments/Library/'.$filename));
      toastr()->error('لايوجد مرفقات');
        return back();
    }
}