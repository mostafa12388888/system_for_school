<?php 
namespace App\Repository;
interface ExameRepositoryInterface{
    public function index();
    public function create();
    public function show($id);
    public function edit($id);
    public function update($requiste);
    public function store($requiste);
    public function destroy($requiste);
}