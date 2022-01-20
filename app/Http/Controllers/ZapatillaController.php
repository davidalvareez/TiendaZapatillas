<?php

namespace App\Http\Controllers;

use App\Models\Zapatilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZapatillaController extends Controller
{
    public function mostrarZapatilla(){
        $listaZapatillas = DB::table('tbl_zapatillas')->get();
        return view('mostrarZapatillas', compact('listaZapatillas'));
    }



























    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zapatilla  $zapatilla
     * @return \Illuminate\Http\Response
     */
    public function show(Zapatilla $zapatilla)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zapatilla  $zapatilla
     * @return \Illuminate\Http\Response
     */
    public function edit(Zapatilla $zapatilla)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zapatilla  $zapatilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zapatilla $zapatilla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zapatilla  $zapatilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zapatilla $zapatilla)
    {
        //
    }
}
