<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormProduitRequest;
use App\Models\Categorie;
use App\Models\Groupe;
use App\Models\Produit;
use Exception;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::with('groupe', 'categorie')->paginate(10);
        return view('produit.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $produit = new Produit();
       return view('produit.form', compact('produit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormProduitRequest $request)
    {
        try {

            $query = Produit::create($request->all());

            if ($query) {
                return redirect()->route('produit.index')->with('success_message', 'Le produit a été bien ajouté');
            }
            
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        $groupe = Groupe::all();
        $categorie = Categorie::all();
        return view('produit.edit', compact('produit', 'groupe', 'categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormProduitRequest $request, Produit $produit)
    {
        try {
            
            $produit->image = $request->image;
            $produit->reference = $request->reference;
            $produit->nomprod = $request->nomprod;
            $produit->qte = $request->qte;
            $produit->prix_achat = $request->prix_achat;
            $produit->modele = $request->modele;
            $produit->codebarre = $request->codebarre;
            $produit->groupe_id = $request->groupe_id;
            $produit->categorie_id = $request->groupe_id;
            $produit->update();
            return redirect()->route('produit.index')->with('success_message', 'Le produit a été bien mis à jour');

        } catch (Exception $e) {
           dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
