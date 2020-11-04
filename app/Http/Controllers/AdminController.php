<?php

namespace App\Http\Controllers;
use App\Repositories\interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    var $AdminRepository;
    public function __construct(AdminRepositoryInterface $AdminRepository)
    {
        $this->AdminRepository=$AdminRepository;
    }

    private function validateRequest($request)
    {
        $request->validate([
            'nom'=>'required | min:4 | max:15',
            'prenom'=>'required | max:15',
            'email'=>'required|email|unique:Admin',
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
            $Admins=$this->AdminRepository->all();
            return response()->json($Admins);
        }
        public function getAdmin($id)
        {
            $Admin=$this->AdminRepository->getById($id);
            return response()->json($Admin);
        }

        public function save(Request $request)
        {
            $validateData=$this->validateRequest($request);
            $Admin=new Admin ([
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
            $this ->AdminRepository->save($Admin);
            return response()->json($Admin);
        
        }
        public function update(Request $request)
        {
            $validateData=$this->validateRequest($request);
            $Admin=new Admin ([
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
            $this ->AdminRepository->update($Admin);
            return response()->json($this->AdminRepository->getById($request->get('id')));
        
        }
        public function delete ($id)
        {
            if ($this ->AdminRepository->delete($id))
            {
                return response()->json (["status"=>'suppression effectué'],200);
            }
            return response()->json (["status"=>'Erreur suppression'],500);
        }
        
    }

        
    

