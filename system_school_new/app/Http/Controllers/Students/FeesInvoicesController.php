<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\FessInvoicesRepositoryinterface;
use  App\Http\Requests\FeesInvoices;
use App\Models\Classrom;
use App\Models\Fee_invoices;
use App\Models\fees;

class FeesInvoicesController extends Controller
{
    public $Fess;
    public function __construct(FessInvoicesRepositoryinterface $Fess)
    {
        $this->Fess=$Fess;
        
    }
    public function index()
    {
   return $this->Fess->index();
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
    public function store(FeesInvoices $request)
    {
        return $this->Fess->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Fess->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $fee_invoices=Fee_invoices::findOrFail($id);
        $fees=fees::where('Classroom_id',$fee_invoices->classrom_id)->get();
        return view('pages.Fees_Invoices.edit',compact('fee_invoices','fees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // return $request;
       return $this->Fess->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Fess->destroy($request);
    }
}
