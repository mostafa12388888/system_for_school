<?php 
namespace App\Repository;
interface payment_studenInterFace{
    public function index();
    public function show($id);
    public function edit($id);
    public function store($requiste);
    
    public function update($requiste);
    public function destroy($requiste);
}