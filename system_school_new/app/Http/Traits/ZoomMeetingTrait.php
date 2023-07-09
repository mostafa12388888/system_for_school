<?php 
namespace App\Http\Traits;
// use Illuminate\Support\Carbon;
use MacsiDigital\Zoom\Facades\Zoom;

// use App\Models\OlineClasses;
trait ZoomMeetingTrait{
    public function CreateMeeting($request){
        // $meeting = Zoom::meeting();
        // $jwtToKen="Your token will be expired at 18:46 04/19/2023";
        // $user= Zoom::user()->first();
  
        // $meeting = Zoom::meeting()->make([
        //     'topic' => $request->topic,
        //     'duration' => $request->duration,
        //     'password' => $request->password,
        //     'start_time' => $request->start_time,

        //      'timezone' => config('zoon.timezoe'),
        //     // 'timezone' => 'Africa/Cairo',
        // ]);
        $user = Zoom::user()->first();

        $meetingData = [
            'topic' => $request->topic,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_time' => $request->start_time,
            'timezone' => config('zoom.timezone')
          // 'timezone' => 'Africa/Cairo'
        ];
        $meeting = Zoom::meeting()->make($meetingData);
        // return $request;
        //$meeting = Zoom::meeting()->make($meetingData);
        $meeting->settings()->make([
            'join_before_host' => false,
            'host_video' => false,
            'participant_video' => false,
            'mute_upon_entry' => true,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording')
        ]);
   
    return $user->meetings()->save($meeting);
        
    
          
        // OlineClasses::create([
        //     'Grade_id' => $request->grade,
        //     'Classrom_id' => $request->class,
        //     'section_id' => $request->section_id,
        //     'topic' => $request->topic,
        //     'State_at' => $request->start_time,
        //     'duration' => $meeting->duration,
        //     'user_id' => Auth::user()->id,
        //     'meeting_id' => $meeting->id,
        //     'start_url' => $meeting->start_url,
        //     'join_url' => $meeting->join_url,
        //     'password' => $meeting->password,
        // ]);
        
        // dd( $user->meetings()->save($meeting));
     //   return $user->meetings()->save($meeting);



     // aaaaaaaaaaa

    //  $user = Zoom::user()->first();

        // $meetingData = [
        //     'topic' => $request->topic,
        //     'duration' => $request->duration,
        //     'password' => $request->password,
        //     'start_time' => $request->start_time,
        //     // 'timezone' => config('zoom.timezone')
        //     'timezone' => 'Africa/Cairo'
        // ];
        // $meeting = Zoom::meeting()->make($meetingData);
        
        //المشكله هنا 
        
        // $meeting->settings()->make([
        //     'join_before_host' => false,
        //     'approval_type' => 1,
        //     'registration_type' => 2,
        //     'enforce_login' => false,
        //     'waiting_room' => false,
        // ]);
       
        // return  $user->meetings()->save($meeting);
     //aaaaaaaaaaaaaaaaa
    }
}
