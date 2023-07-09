<?php

namespace App\Http\Controllers;

use App\Models\Quizzes;
use Illuminate\Http\Request;
use App\Repository\QuizesInterfaceRepository;
class QuizzesController extends Controller
{
    public $quizzes;
    public function __construct(QuizesInterfaceRepository $quizzes)
    {
        $this->quizzes=$quizzes;
    }
    public function index()
    {
       return $this->quizzes->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->quizzes->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->quizzes->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->quizzes->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->quizzes->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->quizzes->destroy($request);
    }
}
