<?php 
namespace App\Repository;

interface ReseptStudentInterface{
    public function index();
    public function show($id);
    public function edit($id);
    public function store($requiste);
    public function update($requiste);
}