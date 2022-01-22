<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function mostrarUser(){
        $listaZapatillas = DB::table('tbl_user')->get();
        return view('mostrarUsers', compact('listaUsers'));
    }

    //Crear usuario
    public function crearUserPost(Request $request){
        $datos = $request->except('_token');    
        $password = md5($datos['pass_user']);   
        try {
            DB::table('tbl_user')->insert(["nombre_user"=>$datos['nombre_user'],"apellido_user"=>$datos['apellido_user'],"dni_user"=>$datos['dni_user'],"telf_user"=>$datos['telf_user'],"email_user"=>$datos['email_user'],"pass_user"=>$password,"tipo_user"=>$datos['tipo_user']]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect('/usuarios');
    }
    
    //Eliminar usuario
    public function eliminarUser($id){
        DB::table('tbl_user')->where('id','=',$id)->delete();
        return redirect('/usuarios');
    }  
    
    //Actualizar usuario
    /*public function modificarPersona($id){
        $persona=DB::table('tbl_zapatilla')->join('tbl_telef','tbl_zapatilla.id','=','tbl_telef.id_zapatilla')->select()->where('id','=',$id)->first();
        return view('modificar', compact('persona'));
    }*/
    public function modificarUserPut(Request $request){
        $datos=$request->except('_token','_method');
        try {
            DB::table('tbl_user')->where('id','=',$datos['id'])->update($datos);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect('/usuarios');
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
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
