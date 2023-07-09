<?php namespace App\Repository;
interface subjectInterfaceRepository{
    public function index();
    public function create();
    public function show();
    public function edit($id);
    public function store($requiste);
    public function update($requiste);
    public function destroy($requiste);
}