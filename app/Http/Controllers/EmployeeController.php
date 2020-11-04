<?php

namespace App\Http\Controllers;
use App\Repositories\interfaces\EmployeeRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    var $EmployeeRepository;
    public function __construct(EmployeeRepositoryInterface $EmployeeRepository)
    {
        $this->EmployeeRepository=$EmployeeRepository;
    }

    private function validateRequest($request)
    {
        $request->validate([
            'nom'=>'required | min:4 | max:15',
            'prenom'=>'required | max:15',
            'email'=>'required|email|unique:Employee',
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
            $Employees=$this->EmployeeRepository->all();
            return response()->json($Employees);
        }
        public function getEmployee($id)
        {
            $Employee=$this->EmployeeRepository->getById($id);
            return response()->json($Employee);
        }

        public function save(Request $request)
        {
            $validateData=$this->validateRequest($request);
            $Employee=new Employee ([
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
            $this ->EmployeeRepository->save($Employee);
            return response()->json($Employee);
        
        }
        public function update(Request $request)
        {
            $validateData=$this->validateRequest($request);
            $Employee=new Employee ([
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
            $this ->EmployeeRepository->update($Employee);
            return response()->json($this->EmployeeRepository->getById($request->get('id')));
        
        }
        public function delete ($id)
        {
            if ($this ->EmployeeRepository->delete($id))
            {
                return response()->json (["status"=>'suppression effectué'],200);
            }
            return response()->json (["status"=>'Erreur suppression'],500);
        }
        
    }

        
    

