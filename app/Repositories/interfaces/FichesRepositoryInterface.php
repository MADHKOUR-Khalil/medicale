<?php
namespace App\Repositories\interfaces;
use App\Models\Fiches;
interface FichesRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function save(Fiches $Fiches);
    public function update(Fiches $Fiches);
    public function delete(int $id);
  

}
?>