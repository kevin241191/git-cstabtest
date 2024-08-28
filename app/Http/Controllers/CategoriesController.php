<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCategoryRequest;
use App\Http\Requests\SearchCategorieRequest;
use App\Http\Requests\UpdateCategory;
use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;
use Laravel\Prompts\Themes\Default\SearchPromptRenderer;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Categorie::orderBy('created_at', 'asc')->paginate(10);
        
        $search = $request->search;

        $categories = Categorie::where(function($query) use ($search){
            $query->orWhere('nomcat', 'like', "%{$search}%");
        })
        ->get();

        return view('admin.categorie.index', compact('categories', 'search'));      
    }

    public function search(Request $request)
    {
        dd($request);
        $search = $request->search;

        $categories = Categorie::where(function($query) use ($search){
            $query->orWhere('nomcat', 'like', "%{$search}%");
        })
        ->get();

        return view('categorie.index', compact('categories', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = new Categorie();      
        return view('admin.categorie.form', compact( 'categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Categorie $categorie, FormCategoryRequest $request)
    {
       try {
         $categorie->nomcat = $request->nomcat;
         $categorie->save();
         return redirect()->route('categorie.index')->with('success_message', 'Catégorie crée avec succès');
       } catch (Exception $e) {
            dd($e);
       }       
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view('admin.categorie.edit', compact('categorie' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategory $request, Categorie $categorie)
    {
        try {
            $categorie->nomcat = $request->nomcat;   
 
            $categorie->update();
           
           return redirect()->route('categorie.index')->with('success_message', 'Les informations de la catégorie ont été mise à jour');
        
         } catch (Exception $e) {
             dd($e);
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        dd($request);
        $search = $request->search;

        $categories = Categorie::where(function($query) use ($search){
            $query->orWhere('nomcat', 'like', "%{$search}%");
        })
        ->get();

        return view('categorie.index', compact('categories', 'search'));
    }

    public function delete(Request $request)
    {
        dd($request);
    }

}
