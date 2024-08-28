<?php

namespace App\Http\Controllers;

use App\Http\Requests\FactFourFormRequest;
use App\Models\FactureFournisseur;
use Exception;
use Illuminate\Http\Request;

class FactureFournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factureFournisseurs = FactureFournisseur::with('receptions')->paginate(10);
        return view('facturefournisseur.index', compact('factureFournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $factureFournisseur = new FactureFournisseur();
        return view('factureFournisseur.form', compact('factureFournisseur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FactFourFormRequest $request)
    {
        try {

            $query = FactureFournisseur::create($request->all());

            if ($query) {
                return redirect()->route('facturefournisseur.index')->with('success_message', 'Le fournisseur a bien reçu sa facture');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FactureFournisseur $factureFournisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactureFournisseur $factureFournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FactFourFormRequest $request, FactureFournisseur $factureFournisseur)
    {
        try {
            $factureFournisseur->reference = $request->reference;
            $factureFournisseur->reception_id = $request->reception_id;
            $factureFournisseur->echeance = $request->echeance;
            $factureFournisseur->montantcommande = $request->montantcommande;
            $factureFournisseur->montantlivraison = $request->montantlivraison;

            $factureFournisseur->update();

            return redirect()->route('facturefournisseur.index')->with('success_message', 'La facture du fournisseur a bien été mise à jour');

        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactureFournisseur $factureFournisseur)
    {
        //
    }
}
