<?php 
namespace App\Repository;
interface studentsRepositoryInterface{
    public function createSudent();
    public function getDataclass($id);
    public function getdatasection($id);
    public function Store_Student($re);
    public function edit_Students($id);
    public function uploadeAttachment($re);
    public function Update_Students($re);
    public function Show_Students($re);
    public function DonloadAttachment1($Sname,$Fname);
public function Delete_attachment($re);
}