<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Receipt_Student;
use Illuminate\Http\Request;
use App\Repository\ReseptStudentInterface;
class ReceptStudentController extends Controller
{
    public $Recept;
    public function __construct(ReseptStudentInterface $Recept)
    {
    $this->Recept=$Recept;
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Recept->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    return $this->Recept->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Recept->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
      return $this->Recept->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Recept->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request )
    {
       try{
        Receipt_Student::destroy($request->id);

       }catch(\Exception $e){
        return redirect()->back()->withErrors(['errors'=>$e->getmessage()],'congrate');
       }
       toastr()->error(trans('messages.Delete'));
       return redirect()->back();
    }
}
