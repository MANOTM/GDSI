<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\Etablissement;

class ImportExelController extends Controller
{
    public function importEmployer(Request $request)
    {
        $validator=$request->validate([
            'file'=>'required'
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName(); 
        $location = 'uploads';
        $file->move($location,$filename);
        $filepath = public_path($location."/".$filename);
        $file = fopen($filepath,"r");
        fgetcsv($file);
        while(($con=fgetcsv($file))!== FALSE){
            $line = explode(';', $con[0]);
            $ppr=$line[0];
            $nom=$line[1];
            $prenom=$line[2];
            $codeEt=$line[3];
            $etablissmet=Etablissement::where('Code_etab',$codeEt)->first();
            $employer=Employer::where('ppr',$ppr)->first();
            if($etablissmet && !$employer){
                Employer::create([
                    'prenom'=>$prenom,
                    'nom'=>$nom,
                    'ppr'=>$ppr,
                    'etablissement_id'=>$etablissmet->id,
                ]);  
            }
        }
        fclose($file);
        return redirect()->back()->with('success',"تمت اضافة مستفيذ بنجاح");
    }
    public function importEtablissemet(Request $request)
    {
        $validator=$request->validate([
            'file'=>'required'
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName(); 
        $location = 'uploads';
        $file->move($location,$filename);
        $filepath = public_path($location."/".$filename);
        $file = fopen($filepath,"r");
        fgetcsv($file);
        
        while(($con=fgetcsv($file))!== FALSE){
            $line = explode(';', $con[0]);
            $codeEta=$line[0];
            $codeDb=$line[1];
            $nom=$line[2];
            $division=$line[3];
            $service=$line[4];
            $cycle=$line[5];
            
            Etablissement::create([
                'Code_etab'=>$codeEta,
                'nom'=>$nom,
                'Division'=>$division,
                'Service'=>$service,
                'Cycle'=>$cycle,
                'db_id'=>(int)$codeDb
            ]); 
        }
        fclose($file);
        return redirect()->back()->with('success',"تمت اضافة مؤسسة بنجاح");
    }
}
