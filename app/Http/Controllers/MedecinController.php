<?php

namespace App\Http\Controllers;
use App\Repositories\interfaces\MedecinRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Medecin;

class MedecinController extends Controller
{
    var $MedecinRepository;
    public function __construct(MedecinRepositoryInterface $MedecinRepository)
    {
        $this->MedecinRepository=$MedecinRepository;
    }

    private function validateRequest($request)
    {
        $request->validate([
            'nom'=>'required | min:4 | max:15',
            'prenom'=>'required | max:15',
            'email'=>'required|email|unique:Medecin',
            'adresse'=>'required | max:60',
            'region'=>'required | max:60',
            'cin'=>'required | min:8 | max:8',
            'tel'=>'required | min:8 | max:8',
            'login'=>'required | max:12',
            'password'=>'required | max:12',
            'photo'=>'required',
        ]);
    }
        public function index()
        {
            $Medecins=$this->MedecinRepository->all();
            return response()->json($Medecins);
        }
        public function getMedecin($id)
        {
            $Medecin=$this->MedecinRepository->getById($id);
            return response()->json($Medecin);
        }

        public function save(Request $request)
        {
            $validateData=$this->validateRequest($request);
            $Medecin=new Medecin ([
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
            $this ->MedecinRepository->save($Medecin);
            return response()->json($Medecin);
        
        }
        public function update(Request $request)
        {
            $validateData=$this->validateRequest($request);
            $Medecin=new Medecin ([
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
            $this ->MedecinRepository->update($Medecin);
            return response()->json($this->MedecinRepository->getById($request->get('id')));
        
        }
        public function delete ($id)
        {
            if ($this ->MedecinRepository->delete($id))
            {
                return response()->json (["status"=>'suppression effectué'],200);
            }
            return response()->json (["status"=>'Erreur suppression'],500);
        }
        
    }

        
    

