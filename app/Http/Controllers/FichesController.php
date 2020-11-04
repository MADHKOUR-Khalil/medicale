<?php

namespace App\Http\Controllers;
use App\Repositories\interfaces\FichesRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Fiches;

class FichesController extends Controller
{
    var $FichesRepository;
    public function __construct(FichesRepositoryInterface $FichesRepository)
    {
        $this->FichesRepository=$FichesRepository;
    }

    private function validateRequest($request)
    {
        $request->validate([
            'hauteur'=>'required',
            'poids'=>'required | min:2 | max:3',
            'sang'=>'required',
            'date'=>'required',
            'temperature'=>'required',
            'doux'=>'required',
            'odeur'=>'required',
            'gout'=>'required',
            'gorge'=>'required',
            'diarrhee'=>'required',
            'fatigue'=>'required',
            'souffle'=>'required',
        ]);
    }
        public function index()
        {
            $Fichess=$this->FichesRepository->all();
            return response()->json($Fichess);
        }
        public function getFiches($id)
        {
            $Fiches=$this->FichesRepository->getById($id);
            return response()->json($Fiches);
        }

        public function save(Request $request)
        {
            $validateData=$this->validateRequest($request);
            $Fiches=new Fiches ([
                'hauteur'=>$request->get('hauteur'),
                'poids'=>$request->get('poids'),
                'sang'=>$request->get('sang'),
                'date'=>$request->get('date'),
                'temperature'=>$request->get('temperature'),
                'doux'=>$request->get('doux'),
                'odeur'=>$request->get('odeur'),
                'gout'=>$request->get('gout'),
                'gorge'=>$request->get('gorge'),
                'diarrhee'=>$request->get('diarrhee'),
                'fatigue'=>$request->get('fatigue'),
                'souffle'=>$request->get('souffle')
            ]);
            $this ->FichesRepository->save($Fiches);
            return response()->json($Fiches);
        
        }
        public function update(Request $request)
        {
            $validateData=$this->validateRequest($request);
            $Fiches=new Fiches ([
                'nom'=>$request->get('nom'),
                'prenom'=>$request->get('prenom'),
                'email'=>$request->get('email'),
                'adresse'=>$request->get('adresse'),
                'region'=>$request->get('region'),
                'cin'=>$request->get('cin'),
                'tel'=>$request->get('tel'),
                'login'=>$request->get('login'),
                'password'=>$request->get('password'),
                'photo'=>$request->get('photo')
            ]);
            $this ->FichesRepository->update($Fiches);
            return response()->json($this->FichesRepository->getById($request->get('id')));
        
        }
        public function delete ($id)
        {
            if ($this ->FichesRepository->delete($id))
            {
                return response()->json (["status"=>'suppression effectué'],200);
            }
            return response()->json (["status"=>'Erreur suppression'],500);
        }
        
    }

        
    

