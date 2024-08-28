<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModeFormRequest;
use App\Http\Requests\UpdateMode;
use App\Models\Mode;
use Exception;
use Illuminate\Http\Request;

class ModeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modes = Mode::paginate(10);
        return view('admin.mode.index', compact('modes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mode = new Mode();      
        return view('admin.mode.form', compact( 'mode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Mode $mode,ModeFormRequest $request)
    {
        try {
            $mode->lib_mode = $request->lib_mode;
            $mode->save();
            return redirect()->route('mode.index')->with('success_message', 'Mode crée avec succès');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mode $mode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mode $mode)
    {
        return view('admin.mode.edit', compact('mode' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMode $request, Mode $mode)
    {
        try {
            $mode->lib_mode = $request->lib_mode;
            $mode->update();
            return redirect()->route('mode.index')->with('success_message', 'Mode mis à jour avec succès');
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mode $mode)
    {
        //
    }
}
