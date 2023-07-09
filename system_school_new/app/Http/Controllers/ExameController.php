<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use Illuminate\Http\Request;
use App\Repository\ExameRepositoryInterface;
class ExameController extends Controller
{
    public $exame;
    public function __construct(ExameRepositoryInterface $exame)
    {
        $this->exame=$exame;
    }
    public function index()
    {
       return $this->exame->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->exame->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->exame->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->exame->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->exame->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exame $exame)
    {
        return $this->exame->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->exame->destroy($request);
    }
}
