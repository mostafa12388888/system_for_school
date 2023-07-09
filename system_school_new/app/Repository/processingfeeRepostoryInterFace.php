<?php 
namespace App\Repository;

interface processingfeeRepostoryInterFace {
    public function index();
    public function show($id);
    public function edit($id);
    public function store($requiste);
    public function update($requiste);
   
}