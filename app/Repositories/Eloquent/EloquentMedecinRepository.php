<?php
namespace App\Repositories\Eloquent;
use App\Models\Medecin;
use App\Repositories\interfaces\MedecinRepositoryInterface;
class EloquentMedecinRepository implements MedecinRepositoryInterface
{
    public function all() {
        return Medecin::all();
    }
    public function getById(int $id)
    {
        return Medecin::where('id',$id)->first();
    }
    public function save(Medecin $Medecin)
    {
        return $Medecin->save();
    }

    public function update(Medecin $Medecin)
    {
        return Medecin::find($Medecin->get('id'))
        ->update([
            'nom'=>$Medecin->get('nom'),
            'prenom'=>$Medecin->get('prenom'),
            'email'=>$Medecin->get('email'),
            'adresse'=>$Medecin->get('adresse'),
            'region'=>$Medecin->get('region'),
            'cin'=>$Medecin->get('cin'),
            'tel'=>$Medecin->get('tel'),
            'login'=>$Medecin->get('login'),
            'password'=>$Medecin->get('password'),
            'photo'=>$Medecin->get('photo')
        ]);
    }

public function delete(int $id)
{
    return Medecin::where('id',$id)->delete();
}
}
?>