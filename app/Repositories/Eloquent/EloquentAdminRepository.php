<?php
namespace App\Repositories\Eloquent;
use App\Models\Admin;
use App\Repositories\interfaces\AdminRepositoryInterface;
class EloquentAdminRepository implements AdminRepositoryInterface
{
    public function all() {
        return Admin::all();
    }
    public function getById(int $id)
    {
        return Admin::where('id',$id)->first();
    }
    public function save(Admin $Admin)
    {
        return $Admin->save();
    }

    public function update(Admin $Admin)
    {
        return Admin::find($Admin->get('id'))
        ->update([
            'nom'=>$Admin->get('nom'),
            'prenom'=>$Admin->get('prenom'),
            'email'=>$Admin->get('email'),
            'adresse'=>$Admin->get('adresse'),
            'region'=>$Admin->get('region'),
            'cin'=>$Admin->get('cin'),
            'tel'=>$Admin->get('tel'),
            'login'=>$Admin->get('login'),
            'password'=>$Admin->get('password'),
            'photo'=>$Medecin->get('photo')
        ]);
    }

public function delete(int $id)
{
    return Admin::where('id',$id)->delete();
}
}
?>