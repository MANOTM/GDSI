<?php

namespace App\Http\Controllers;

use App\Models\marche;
use App\Models\article;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('id')){
            $marche = marche::find($request->id);
        }else{
            $marche = marche::all()->last();
        }
        $marches = marche::all(); 
        if(!$marche){
            return redirect('/')->with('error', new HtmlString("لا توجد اي منتجات حاليا, لاضافة منتج جديد  <a href='".  route('article.create') ."'  class='text-light text-decoration-none border-bottom border-light'> اضغط هنا </a> "));
        }
        return view('article.index',compact('marche','marches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Arr=["Ordinateur portable","Imprimante Multifuntion","Imprimante Couleur","Vidéo projecteur","Photocopieuse","Scanner","Autre"];
        $marches = marche::all();
        return view('article.create',compact('Arr','marches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marche_id' => 'required',
            'nom' => 'required',
            'QuntiteInit' => 'required:min:0|max:20000',
            'prix' => 'required|min:0|max:50000',
            'configue' => 'required', 
        ]);
        $validated['QuntiteActual'] = $validated['QuntiteInit'];
        article::create($validated);
        return redirect()->route('marche.index')->with('success','تم الاضافة بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        $article->delete();
        return redirect()->route( url("/article?id=".$article->marche->id) )->with('success','تم الحذف بنجاح');
    }
}
