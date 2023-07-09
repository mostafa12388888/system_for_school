<?php
namespace App\Repository;


Interface teacherqueziesInterface{
    public function index();
    public function create();
    public function desrtroy($request);
    public function getDataclass($id);
    public function edite($id);
    public function show($id);
    public function update( $request);
    public function getdatasection($id);
}