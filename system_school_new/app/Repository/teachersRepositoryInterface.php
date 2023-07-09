<?php
namespace App\Repository;


interface teachersRepositoryInterface{
    public function getAllteachers();
    public function getAllgender();
    public function getAllsections();
    public function setTeacher($re);
    public function setUpdate($re);

}