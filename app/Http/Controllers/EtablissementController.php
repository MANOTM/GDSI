<?php

namespace App\Http\Controllers;

use App\Models\Db;
use Exception;
use Illuminate\Http\Request;
use App\Models\Etablissement;

class EtablissementController extends Controller
{
    public function create()
    {
        $dbs=Db::all();
        $sycles=['الابتدائي',"التانوي التاهيلي","التانوي الاعدادي"];
        return view('etablissement.create',compact('dbs','sycles'));
    }
    public function findEta(Request $request)
    {
        $eta=Etablissement::where('Code_etab',$request->code)->first();
        return json_encode($eta);
    }
    public function store(Request $request)
    {
        $validator=$request->validate([
            'db'=>'required',
            'nom'=>'required',
            'code'=>'required|unique:etablissements,Code_etab',
            'division'=>'required',
            'cycle'=>'required',
            'service'=>'required',
        ]);
        try{
            Etablissement::create([
                'Code_etab'=>$request->code,
                'nom'=>$request->nom,
                'Division'=>$request->division,
                'Service'=>$request->service,
                'Cycle'=>$request->cycle,
                'db_id'=>$request->db
            ]);
            return redirect()->back()->with('success',"تمت اضافة مؤسسة $request->nom بنجاح");
        }catch(Exception $e){
            return redirect()->back()->with('failed','عذرا حدت خطا');
        }
    } 
}
