<?php 
namespace App\Repository;

interface FeesRepositoryinterface{
    public function index();
    public function create();
    public function store($re);
    public function update($re);
}