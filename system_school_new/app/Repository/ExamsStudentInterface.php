<?php 
namespace App\Repository;
interface ExamsStudentInterface{
    public function index();
    public function edit($id);
    public function show($id);
    public function update($request);
    public function destroy($request);
}