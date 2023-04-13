<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Exception;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function create()
    {  
        return view('employer.create');
    }
    public function store(Request $request)
    {
        $validator=$request->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'ppr'=>'required|unique:employers,ppr',
            'etaC'=>'required', 
            'etaN'=>'required', 
        ]);
        try{
            Employer::create([
                'prenom'=>$request->prenom,
                'nom'=>$request->nom,
                'ppr'=>$request->ppr,
                'etablissement_id'=>$request->etaC,
            ]);
            return redirect()->back()->with('success',"تمت اضافة مستفيذ $request->nom بنجاح");
        }catch(Exception $e){
            return redirect()->back()->with('failed','عذرا حدت خطا');
        }
    } 
}
