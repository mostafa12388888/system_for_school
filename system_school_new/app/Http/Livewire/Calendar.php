<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{
   public $x;
    public $events = '';
  
 
 
    public function getevent()
    {       
        $events = Event::select('id','title','start')->get();
 
        return  json_encode($events);
    }
 
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        Event::create($input);
    
    }
    public function eventDrop($event, $oldEvent)
    {
    //    dd($oldEvent); 
    if(empty($event['id']))
      
    $event['id']=Event::where('title',$oldEvent['title'])->orWhere('start',$oldEvent['start'])->pluck('id')->first();
   
    $eventdata = Event::find($event['id']);
 
 
  $eventdata->start = $event['start'];
  $eventdata->save();
}
public function delete($id){
$name =Event::findOrfail($id);
Event::destroy($id);
return  $name->title;
 }
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function render()
    {       
        $events = Event::select('id','title','start')->get();
 
        $this->events = json_encode($events);
 
        return view('livewire.calendar');
    }
  public function  deltet($id){
    Event::destroy($id);
  }
}
