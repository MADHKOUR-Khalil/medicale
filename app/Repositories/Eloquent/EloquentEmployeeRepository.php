<?php
namespace App\Repositories\Eloquent;
use App\Models\Employee;
use App\Repositories\interfaces\EmployeeRepositoryInterface;
class EloquentEmployeeRepository implements EmployeeRepositoryInterface
{
    public function all() {
        return Employee::all();
    }
    public function getById(int $id)
    {
        return Employee::where('id',$id)->first();
    }
    public function save(Employee $Employee)
    {
        return $Employee->save();
    }

    public function update(Employee $Employee)
    {
        return Employee::find($Employee->get('id'))
        ->update([
            'nom'=>$Employee->get('nom'),
            'prenom'=>$Employee->get('prenom'),
            'email'=>$Employee->get('email'),
            'adresse'=>$Employee->get('adresse'),
            'region'=>$Employee->get('region'),
            'cin'=>$Employee->get('cin'),
            'tel'=>$Employee->get('tel'),
            'login'=>$Employee->get('login'),
            'password'=>$Employee->get('password'),
            'photo'=>$Medecin->get('photo')
        ]);
    }

public function delete(int $id)
{
    return Employee::where('id',$id)->delete();
}
}
?>