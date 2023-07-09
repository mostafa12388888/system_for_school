<?php
namespace App\Repository;
interface promotionsRepositoryInterface{
    public function index();
    public function store($re);
    public function create();
    public function destroy($re);
}