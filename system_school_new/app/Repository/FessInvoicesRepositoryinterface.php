<?php
namespace App\Repository;


interface FessInvoicesRepositoryinterface{
    public function index();
    public function show($id);
    public function store($re);
    public function update($re);
    public function destroy($re);
}