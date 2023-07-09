<?php 
namespace App\Repository;
interface QuizesInterfaceRepository{
    public function index();
    public function create();
    public function edit($id);
    public function store($requiste);
    public function update($requiste);
    public function destroy($requiste);
}