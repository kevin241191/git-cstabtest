<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegFourFormRequest;
use App\Models\ReglementFournisseur;
use Exception;
use Illuminate\Http\Request;

class ReglementFournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reglementFournisseurs = ReglementFournisseur::with('facture_fournisseurs', 'mode')->paginate(10);
        return view('reglementfournisseur.index', compact('reglementFournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $reglementFournisseur = new ReglementFournisseur();
        return view('reglementfournisseur.form', compact('reglementFournisseur'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegFourFormRequest $request)
    {
        try {

            $query = ReglementFournisseur::create($request->all());

            if ($query) {
                return redirect()->route('reglementfournisseur.index')->with('success_message', 'Le fournisseur a bien payé sa facture');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ReglementFournisseur $reglementFournisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReglementFournisseur $reglementFournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReglementFournisseur $reglementFournisseur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReglementFournisseur $reglementFournisseur)
    {
        //
    }
}
