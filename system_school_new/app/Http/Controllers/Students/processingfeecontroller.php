<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\processingfee;
use Illuminate\Http\Request;
use App\Repository\processingfeeRepostoryInterFace;
use App\Repository\promotionsRepositoryInterface;
use App\Models\Student;

class processingfeecontroller extends Controller
{
    public $pro;
    public function __construct(processingfeeRepostoryInterFace $pro)
    {
     $this->pro=$pro;
        
    }
    public function index()
    {
        return $this->pro->index();
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
        return $this->pro->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
      
       return $this->pro->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       return $this->pro->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->pro->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request )
    {
        try{
        processingfee::destroy($request->id);
      
    }catch(\Exception $e){
        return redirect()->back()->withErrors(['errors'=>$e->getmessage()],'congrate');
       }
       toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }
}
