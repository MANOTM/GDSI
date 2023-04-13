<?php

namespace App\Http\Controllers;

use App\Models\marche;
use Illuminate\Http\Request;

class MarcheController extends Controller
{
    public $typeMarche;
    public function __construct()
    {
        $this->middleware('auth');
        $this->typeMarche = ["Marche","Bon Commande","Don","VMM","SMM"];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marche =  marche::latest('id')->get();
        $Arr= $this->typeMarche;
        return view('marche.index',compact('marche','Arr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Arr= $this->typeMarche;
        return view('marche.create', compact('Arr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'type' => 'required',
            'code' => 'required',
            'date' => 'required|date',
            'annee' => 'required|gt:2000',
            'objet' => 'required',
            'montant' => 'required|gt:0|lt:2000000',
            'entreprise' => 'required|min:1',
        ]);
        marche::create($validation);
        return redirect()->route('marche.index')->with('success','تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, marche $marche)
    {
        $validation = $request->validate([
            'type' => 'required',
            'code' => 'required',
            'date' => 'required|date',
            'annee' => 'required',
            'objet' => 'required',
            'montant' => 'required',
            'entreprise' => 'required',
        ]);
        $marche->fill($validation)->save();
        return redirect()->route('marche.index')->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(marche $marche)
    {
        $marche->delete();
        return redirect()->route('marche.index')->with('success','تم الحذف بنجاح');
    }
}
