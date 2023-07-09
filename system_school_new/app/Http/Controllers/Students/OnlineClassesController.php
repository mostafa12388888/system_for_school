<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Traits\ZoomMeetingTrait;
use App\Models\Grate;
use Illuminate\Http\Request;
use App\Models\OlineClasses;
use MacsiDigital\Zoom\Facades\Zoom;
class OnlineClassesController extends Controller
{
    use ZoomMeetingTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $online_classes=OlineClasses::where('created_by',auth()->user()->email)->get();
return view('pages.online_classes.index',compact('online_classes'));
    }

   public function Indirect_online(){
    $Grades=Grate::get();
    return view('pages.online_classes.indirect',compact('Grades'));
   }
   public function Indirect_Store(Request $request)
   {
    // try {
        OlineClasses::create([
            'integration'=>false,
            'Grade_id' => $request->Grade_id,
            'Classrom_id' => $request->Classroom_id,
            'section_id' => $request->section_id,
            'created_by' => auth()->user()->email,
            'meeting_id' => $request->meeting_id,
            'topic' => $request->topic,
            'State_at' => $request->start_time,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_url' => $request->start_url,
            'join_url' => $request->join_url,
        ]);
        toastr()->success(trans('messages.success'));
        return redirect()->route('online_classes.index');
    // } catch (\Exception $e) {
    //     return redirect()->back()->with(['error' => $e->getMessage()]);
    // }
   
   }
    public function create()
    {
        $Grades=Grate::get();
        return view('pages.online_classes.add',compact('Grades'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // try{
            $meeting= $this->CreateMeeting($request);
   
       OlineClasses::create([
        'integration'=>true,
                'Grade_id' => $request->Grade_id,
                'Classrom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth()->user()->email,
                'meeting_id' => $meeting->id,
                // 'meeting_id' => 2,
                'topic' => $request->topic,
                'State_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                // 'password' => 2,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
       toastr()->success(trans('messages.success'));
       return redirect()->route('online_classes.index');
//    } catch (\Exception $e) {
//        return redirect()->back()->with(['error' => $e->getMessage()]);
   

//         }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {

            $info = OlineClasses::findOrfail($request->id);

            if($info->integration == true){
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
               // online_classe::where('meeting_id', $request->id)->delete();
               OlineClasses::destroy($request->id);
            }
            else{
                OlineClasses::destroy($request->id);
               
            }

            toastr()->error(trans('messages.Delete'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
    
}
