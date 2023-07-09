<?php 
namespace App\Repository;

interface AttedanceRepositoryInterface{
    public function index();
    public function show($id);
    public function edit($id);
    public function update($requiste);
    public function store($requiste);
    public function destroy($requiste);
}