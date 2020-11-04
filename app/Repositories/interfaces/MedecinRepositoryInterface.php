<?php
namespace App\Repositories\interfaces;
use App\Models\Medecin;
interface MedecinRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function save(Medecin $Medecin);
    public function update(Medecin $Medecin);
    public function delete(int $id);
  

}
?>