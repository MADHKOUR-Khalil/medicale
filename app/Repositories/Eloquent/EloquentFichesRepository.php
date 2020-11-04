<?php
namespace App\Repositories\Eloquent;
use App\Models\Fiches;
use App\Repositories\interfaces\FichesRepositoryInterface;
class EloquentFichesRepository implements FichesRepositoryInterface
{
    public function all() {
        return Fiches::all();
    }
    public function getById(int $id)
    {
        return Fiches::where('id',$id)->first();
    }
    public function save(Fiches $Fiches)
    {
        return $Fiches->save();
    }

    public function update(Fiches $Fiches)
    {
        return Fiches::find($Fiches->get('id'))
        ->update([
            'hauteur'=>$Fiches->get('hauteur'),
            'poids'=>$Fiches->get('poids'),
            'sang'=>$Fiches->get('sang'),
            'date'=>$Fiches->get('date'),
            'temperature'=>$Fiches->get('temperature'),
            'doux'=>$Fiches->get('doux'),
            'odeur'=>$Fiches->get('odeur'),
            'gout'=>$Fiches->get('gout'),
            'gorge'=>$Fiches->get('gorge'),
            'diarrhee'=>$Medecin->get('diarrhee'),
            'fatigue'=>$Medecin->get('fatigue'),
            'souffle'=>$Medecin->get('souffle')
        ]);
    }

public function delete(int $id)
{
    return Fiches::where('id',$id)->delete();
}
}
?>