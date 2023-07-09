<?php 
namespace App\Repository;
interface StudentGrateRepositoryInterface{
    public function index();
    public function create();
    public function store($re);
    public function restoredate($re);
    public function destroy($re);
    public function graduate_student($id);
     public function promotion_student($re);


}