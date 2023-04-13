<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\db_call;
use App\Models\Db;
use App\Models\Employer;
use App\Models\employer_call;
use App\Models\Etablisement_call;
use App\Models\Etablissement;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class distributionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        // article info
        $article = article::find($request->article_id);
        if(!$request->article_id) $article = article::latest()->first();
        if(empty($article)){
            return redirect('/')->with('error', new HtmlString("السوق المختار لا يتوفر على اي منتجات حاليا, لاضافة منتج جديد  <a href='".  route('article.create') ."'  class='text-light text-decoration-none border-bottom border-light'> اضغط هنا </a> "));
        }
        $marche = $article->marche;
        $p = intval(($marche->articles->sum('QuntiteActual')/$marche->articles->sum('QuntiteInit'))*100);
        // db db_call info
        $List = Db::all();
        $dbs = [];
        foreach($List as $db){
            $db_call = db_call::where('db_id',$db->id)->where('article_id',$article->id)->first();
            $db->date = null;
            $db->quntite = null;
            $db->article = $article->id;
            if($db_call){
                $db->date = $db_call->date;
                $db->quntite = $db_call->quntite;
                $db->article = $article->id;
            }
            $dbs[] = $db;
        }
        return view('distribution.index',compact('dbs','article','marche','p'));
    }

    public function store_db(Request $request)
    {
        $db_call = db_call::where('db_id',$request->id)
            ->where('article_id',$request->db_id)->first();
        $article = article::findOrFail($request->db_id);
        $valide = $request->validate([
            'quntite' => "required|min:1|max:$article->QuntiteActual"
        ]);
        if($article->QuntiteActual < $request->quntite || $article->QuntiteActual == 0){
            return redirect()->back()->with('error',"الكمية التي تطلبها اكثر من المتوفرة في المنتج $article->nom");
        }
        $article->QuntiteActual = $article->QuntiteActual - $request->quntite;
        $article->update();
        if($db_call){
            $db_call->date = date('y-m-d');
            $db_call->quntite = $db_call->quntite + $request->quntite;
            $db_call->update();
        }else{
            db_call::create([
                'db_id' => $request->id,
                'quntite' => $request->quntite,
                'quntite_total' => $request->quntite,
                'article_id' => $article->id,
                'marche_id' => $article->marche->id,
                'date' => date('y-m-d')
            ]);
            $db_call = db_call::where('db_id',$request->id)->first();
        }
        return redirect()->back()->with('success',"  تم تزيع الى ".$db_call->Db->Désignation_ar." كمية قدرها  ".$request->quntite."");
    }

    public function Db_index(Request $request)
    {
        $db_info = Db::findOrFail($request->Db_id);
        $db_call = db_call::where('db_id',$request->Db_id)->where('article_id',$request->article_id)->first();
        $db = $db_info->toArray() + ['quantite' => $db_call->quntite??0,'date'=> $db_call->date??0];
        $etablisements = [];
        foreach($db_info->etablissement as $etab){
            $etab_call = Etablisement_call::where('etablisement_id',$etab->id)->where('article_id',$request->article_id)->first();
            $etab->date = null;
            $etab->quantite = null;
            $etab->article = $request->article_id;
            if($etab_call){
                $etab->date = $etab_call->date;
                $etab->quantite = $etab_call->quantite;
            }
            $etablisements[] = $etab;
        }
        if(empty($etablisements)){        
            return redirect()->back()->with('error', new HtmlString("الجهة $db_info->Désignation_ar لا تتوفر على اي مؤسسات حاليا ,  لاضافة مؤسسة جديد  <a href='". route('etablissement.create')."'  class='text-light text-decoration-none border-bottom border-light'> اضغط هنا </a> "));
            return redirect()->back()->with('error',"الجهة $db_info->Désignation_ar لا تتوفر على اي مؤسسات حاليا ");
        }
        $article = article::find($request->article_id);
        $marche = $article->marche;
        $p = intval(($marche->articles->sum('QuntiteActual')/$marche->articles->sum('QuntiteInit'))*100);
        $pdb = intval(($db_info->db_call->sum('quntite')/$db_info->db_call->sum('quntite_total'))*100);
        return view('distribution.index',compact('etablisements','marche','p','article','db','db_call','pdb'));
    }

    public function store_etab(Request $request)
    {
        $db_call = db_call::where('db_id',$request->db_id)->where('article_id', $request->article_id)->first();
        $etablisement_call = Etablisement_call::where('etablisement_id',$request->id)->where('article_id',$request->article_id)->first();
        if($db_call->quntite < $request->quntite || $db_call->quntite == 0){
            return redirect()->back()->with('error',"الكمية التي تطلبها اكثر من المتوفرة في  ".$db_call->Db->Désignation_ar );
        }
        $article = article::findOrFail($request->article_id);
        $valide = $request->validate([
            'quntite' => "required|min:1|max:$db_call->quntite"
        ]);
        $db_call->quntite = $db_call->quntite - $request->quntite;
        $db_call->update();
        if($etablisement_call){
            $etablisement_call->date = date('y-m-d');
            $etablisement_call->quantite = $etablisement_call->quantite + $request->quntite;
            $etablisement_call->update();
            return redirect()->back()->with('success',"  تم تزيع الى ".$etablisement_call->Etablisement->nom." كمية قدرها  ".$request->quntite."");
        }else{
            Etablisement_call::create([
                'article_id' => $db_call->article_id,
                'etablisement_id' => $request->id,
                'quantite' => $request->quntite,
                'marche_id' => $article->marche->id,
                'quantiteTotal' => $request->quntite,
                'date' => date('y-m-d')
            ]);
        }
        return redirect()->back()->with('success',"  تم تزيع , كمية قدرها  ".$request->quntite );
    }

    public function etablisement_index(Request $request)
    {
        $etablisement = $request->etab_id;
        $eta = Etablissement::findOrFail($etablisement);
        $employers = [];
        $article_id = $request->article_id;
        $List = Employer::where('etablissement_id',$request->etab_id)
            ->orderBy('updated_at', 'desc')
            ->get();
        foreach($List as $employer){
            $employer_call = employer_call::where('employer_id',$employer->id)->where('article_id',$request->article_id)->first();
            $employer->date = null;
            $employer->article_code = null;
            $employer->article = $request->article_id;
            if($employer_call){
                $employer->date = $employer_call->date;
                $employer->article_code = $employer_call->article_code;
            }
            $employers[] = $employer;
        }
        if(empty($employers)){
            return redirect()->back()->with('error', new HtmlString("المؤسسة $eta->nom لا تتوفر على اي موظفين حاليا لاضافة موطف جديد  <a href='".  route('employer.create') ."'  class='text-light text-decoration-none border-bottom border-light'> اضغط هنا </a> "));
        }
        $article = article::find($request->article_id);
        $marche = $article->marche;
        $db = $eta->db;
        $db_call = db_call::where('db_id',$db->id)->first();
        $eta_call = Etablisement_call::where('etablisement_id',$eta->id)->first();
        $p = intval(($marche->articles->sum('QuntiteActual')/$marche->articles->sum('QuntiteInit'))*100);
        $pdb = intval(($db->db_call->sum('quntite')/$db->db_call->sum('quntite_total'))*100);
        $peta = intval(($eta_call->sum('quantite')/$eta_call->sum('quantiteTotal'))*100);
        return view('distribution.index',compact('employers','eta_call','etablisement','article','marche','p','eta','db','db_call','pdb','peta'));
    }

    public function employer_find(Request $request)
    {
        $employer = Employer::where('ppr',$request->code)->where('etablissement_id',$request->etablisement)->first();
        return json_encode($employer);
    }

    public function store_employer(Request $request)
    {
        $employer__call = employer_call::where('employer_id',$request->id_employer)->where('article_id',$request->article_id)->first();
        $etablisement_call = Etablisement_call::where('etablisement_id',$request->etablisement)->where('article_id',$request->article_id)->first();
        $valide = $request->validate([
            'employer' => 'required',
            'name' => 'required',
            'article_unique_code' => 'required|min:2'
        ]);
        $article = article::findOrFail($request->article_id);
        if($employer__call){
            $employer__call->date = date('y-m-d');
            $employer__call->quantiteTotal =$employer__call->quantiteTotal+1;
            $employer__call->article_code = $request->article_unique_code;
            $employer__call->update();
        }else{
            employer_call::create([
                "article_id" => $request->article_id,
                'employer_id' => $request->id_employer,
                'quantite' => 1,
                'quantiteTotal' => 1,
                'marche_id' => $article->marche->id,
                'article_code' => $request->article_unique_code,
                'date' => date('y-m-d')
            ]);
        }
        $etablisement_call->quantite = $etablisement_call->quantite - 1;
        $etablisement_call->date = date('y-m-d');
        $etablisement_call->update();
        return redirect()->back()->with('success',"  تم توزيع الى ".$request->name);
    }
}
