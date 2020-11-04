<?php
namespace App\Repositories\interfaces;
use App\Models\Admin;
interface AdminRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function save(Admin $Admin);
    public function update(Admin $Admin);
    public function delete(int $id);
  

}
?>