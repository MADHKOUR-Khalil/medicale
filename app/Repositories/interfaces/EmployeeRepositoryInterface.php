<?php
namespace App\Repositories\interfaces;
use App\Models\Employee;
interface EmployeeRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function save(Employee $Employee);
    public function update(Employee $Employee);
    public function delete(int $id);
  

}
?>