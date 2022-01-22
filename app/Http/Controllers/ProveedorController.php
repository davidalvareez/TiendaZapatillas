<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function mostrarProveedor(){
        $listaZapatillas = DB::table('tbl_proveedor')->get();
        return view('mostrarProveedor', compact('listaProveedores'));
    }
    public function crearProveedorPost(Request $request){
        $datos = $request->except('_token');
        try {
            DB::table('tbl_proveedor')->insert(["nombre_prov"=>$datos['nombre_prov'],"direccion_prov"=>$datos['direccion_prov'],"codpost_prov"=>$datos['codpost_prov'],"cif_prov"=>$datos['cif_prov'],"telf_prov"=>$datos['telf_prov']]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect('/proveedor');
    }
    public function eliminarProveedor($id){
        //Primero eliminamos todas las zapas a través de un bucle y despues el proveedor
        DB::table('tbl_proveedor')->where('id','=',$id)->delete();
        return redirect('/proveedor');
    }
    public function modificarProveedorPut(Request $request){
        $datos=$request->except('_token','_method');
        try {
            DB::table('tbl_proveedor')->where('id','=',$datos['id'])->update($datos);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect('/proveedor');
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
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
