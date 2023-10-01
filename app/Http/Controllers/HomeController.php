<?php

namespace App\Http\Controllers;

use App\Models\Db;
use App\Models\marche;
use App\Models\article;
use App\Models\db_call;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\Etablisement_call;
use App\Models\employer_call;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
     
    public function index()
    {
        //get date of the Year
        $lastD = date('Y') . '-12-31'; 
        $firstD = date('Y') . '-01-01'; 
        //get the sum of quntite for all the articles of current year
        $allProduits=article::whereBetween('created_at',[$firstD,$lastD])->sum('QuntiteInit');
        //get Q of last article
        $lastAdd=article::latest()->first(); 
        // this its because $lastAdd maybe be null
        $lastAdd = $lastAdd ? $lastAdd->QuntiteInit : 0; 
        
        $produitsDis=db_call::whereBetween('created_at',[$firstD,$lastD])->sum('quntite_total');
        $lastDis=db_call::latest()->first();
        $lastDis= $lastDis?$lastDis->quntite_total:0;
        
        $produitsFree=article::whereBetween('created_at',[$firstD,$lastD])->sum('QuntiteActual');

        //marhce
        $macrheCount=marche::all()->count();
        $macrheCountYaer=marche::whereBetween('created_at',[$firstD,$lastD])->count();
  
        $dbs=Db::all(); 

        //classes
        $classes=['purple','success','warning','danger','info','primary','dark'];
        return view('home',compact('allProduits','lastAdd','produitsFree','produitsDis','lastDis','dbs','classes','macrheCount','macrheCountYaer'));
    }


    public function search(Request $request)
    {
        $validator=$request->validate([
            'code'=>'required|exists:Marches,code',
            'start_at'=>'nullable|date',
            'end_at'=>'nullable|date',
        ]);

        //search by code but i need id
        $code=$request->code;
        $idMarche=marche::where('code',$code)->first()->id; 
        if($request->filled('start_at')){
            $start_at = date($request->start_at);
            if(!$request->filled('end_at')){
                $end_at = date('Y-m-d'); 
                $dbs = db_call::whereBetween('date', [$start_at, $end_at])->where('marche_id',$idMarche)->get();
                $etablissemets=Etablisement_call::whereBetween('date', [$start_at, $end_at])->where('marche_id',$idMarche)->get();
                $employers=employer_call::whereBetween('date', [$start_at, $end_at])->where('marche_id',$idMarche)->get();
            }else{
                $end_at = date($request->end_at); 
                $dbs = db_call::whereBetween('date', [$start_at, $end_at])->where('marche_id',$idMarche)->get();
                $etablissemets=Etablisement_call::whereBetween('date', [$start_at, $end_at])->where('marche_id',$idMarche)->get();
                $employers=employer_call::whereBetween('date', [$start_at, $end_at])->where('marche_id',$idMarche)->get();
            }
        }else{
            $dbs=db_call::where('marche_id',$idMarche)->get();  
            $etablissemets=Etablisement_call::where('marche_id',$idMarche)->get();  
            $employers=employer_call::where('marche_id',$idMarche)->get();  
        }
        // return view('dashboard.index',compact('code','dbs','etablissemets','employers'));
        return redirect('/')->with(compact('code','dbs','etablissemets','employers'));
    }
    public function convertLanguage($locale)
    {
        if (in_array($locale, ['en', 'ar'])) {
            Session::put('locale', $locale);
        } 
        return redirect()->back();
    }
}
