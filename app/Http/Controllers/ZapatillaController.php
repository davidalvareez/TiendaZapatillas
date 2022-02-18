<?php

namespace App\Http\Controllers;

use App\Models\Zapatilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\MAIL;
use App\Mail\EnviarMensaje;

class ZapatillaController extends Controller
{
    //Mostrar zapatilla
    public function mostrarZapatilla(){
        $listaZapatillas = DB::table('tbl_zapatillas')->get();
        return view('mostrarZapatillas', compact('listaZapatillas'));
    }
    //Crear zapatilla
    public function crearZapatillaGet(){
        return view('crearzapatilla');
    }

    public function crearZapatillaPost(Request $request){
        $datos = $request->except('_token');
        if ($request->hasFile('foto_zapatilla')) {
            $datos['foto_zapatilla'] = $request->file('foto_zapatilla')->store('uploads','public');
        }else{
            $datos['foto_zapatilla'] = null;
        }         
        try {
            DB::table('tbl_zapatillas')->insert(["foto_zapatilla"=>$datos['foto_zapatilla'],"marca_zapatilla"=>$datos['marca_zapatilla'],"modelo_zapatilla"=>$datos['modelo_zapatilla'],"color_zapatilla"=>$datos['color_zapatilla'],"talla_zapatilla"=>$datos['talla_zapatilla'],"precio_zapatilla"=>$datos['precio_zapatilla'],"id_proveedor"=>$datos['id_proveedor']]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect('/');
    }
    //Eliminar zapatilla
    public function eliminarZapatilla($id){
        //Eliminar tambien la foto del storage
        $foto = DB::table('tbl_zapatillas')->select('foto_zapatilla')->where('id','=',$id)->first();       
        if ($foto->foto_zapatilla != null) {
            Storage::delete('public/'.$foto->foto_zapatilla); 
        }
        DB::table('tbl_zapatillas')->where('id','=',$id)->delete();
        return redirect('/');
    }   
    //Modificar zapatilla
    public function modificarZapatilla($id){
        $zapatilla=DB::table('tbl_zapatillas')->where('id','=',$id)->first();
        return view('modificarzapatilla', compact('zapatilla'));
    }
    public function modificarZapatillaPut(Request $request){
        $datos=$request->except('_token','_method');
        if ($request->hasFile('foto_zapatilla')) {
            $foto = DB::table('tbl_zapatillas')->select('foto_zapatilla')->where('id','=',$request['id'])->first();          
            if ($foto->foto_zapatilla != null) {
                Storage::delete('public/'.$foto->foto_zapatilla); 
            }
            $datos['foto_zapatilla'] = $request->file('foto_zapatilla')->store('uploads','public');
        }else{
            $foto = DB::table('tbl_zapatillas')->select('foto_zapatilla')->where('id','=',$request['id'])->first();
            $datos['foto_zapatilla'] = $foto->foto_zapatilla;
        }
        try {
            DB::table('tbl_zapatillas')->where('id','=',$datos['id'])->update($datos);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect('/');
    }
    /*LOGIN*/
    public function login(){
        return view('login');
    }
    public function loginPost(Request $request){
        $datos_frm = $request->except('_token','_method');
        $email=$datos_frm['email_user'];
        $password=md5($datos_frm['pass_user']);
        //$password=sha1($password);
        $users = DB::table("tbl_user")->where('email_user','=',$email)->where('pass_user','=',$password)->count();
        $user = DB::table("tbl_user")->where('email_user','=',$email)->where('pass_user','=',$password)->first();
        if($users == 1){
            //Establecer la sesion
            $request->session()->put('email',$request->email_user);
            $request->session()->put('tipouser',$user->tipo_user);
            return redirect('/');
        }else{
            //Redirigir al login
            return redirect('/login');
        }
    }
    //Logout
    public function logout(Request $request){
        //Olvidar una sesion en especifico
            //$request->session()->forget('email');
        //Eliminar todas las variables de sesion
        $request->session()->flush();
        return redirect('/');
    }

    //Agregar elemento al carrito
    public function addShoppingCart($id){
        if (session()->has('carroCompra')) {
            $element = DB::select("SELECT * FROM tbl_zapatillas where id=$id");
            $cart = session()->get('carroCompra');
            $posicion = sizeof($cart);
            $cart[$posicion]=['modelo_zapatilla' => $element[0]->modelo_zapatilla, 'precio_zapatilla' => $element[0]->precio_zapatilla,'foto_zapatilla' => $element[0]->foto_zapatilla];
            session()->forget('carroCompra');
            session()->put('carroCompra',$cart);
            return redirect('/');
        }else{
            $element = DB::select("SELECT * FROM tbl_zapatillas where id=$id");
            $cart = [['modelo_zapatilla' => $element[0]->modelo_zapatilla, 'precio_zapatilla' => $element[0]->precio_zapatilla,'foto_zapatilla' => $element[0]->foto_zapatilla]];
            session()->put('carroCompra',$cart);
            return redirect('/');
        }
    }
    //Vista factura antes de efectuar el pago
    public function factura(){
       return view('factura');
    }
    public function pagar(Request $request,$total){
        $sub = "Compra enjfnajdfasfas";
        $msj = "";
        $datos = array('message'=>$msj);
        $enviar = new EnviarMensaje($datos);
        $enviar->sub = $sub;
        Mail::to($request->input('correo'))->send($enviar);
        session()->forget('carroCompra');
        //return redirect('/');
        # return $precio;
        //Aqui generamos la clase ApiContext que es la que hace la conexión
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')      // ClientSecret
            )
           );
           //Generamos otra clase Payer
           $payer = new \PayPal\Api\Payer();
           $payer->setPaymentMethod('paypal');
           //Generamos la tercera clase (Amount)
           $amount = new \PayPal\Api\Amount();
            //precio a pagar
           $amount->setTotal($total);
           $amount->setCurrency('EUR');
           //Generamos otra clase donde le pasamos el precio y la moneda
           $transaction = new \PayPal\Api\Transaction();
           $transaction->setAmount($amount);
            //le envioa la pagina informacion del id
            //si se cancela lo llevo a la pagina que quiero
            $redirectUrls = new \PayPal\Api\RedirectUrls();
            $redirectUrls->setReturnUrl(url("comprado"))->setCancelUrl(url("/"));   
            $payment = new \PayPal\Api\Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);   
                try {
                    $payment->create($apiContext);
                    //me redirige a la pagina de compra
                    return redirect()->away( $payment->getApprovalLink());    
                }
                catch (\PayPal\Exception\PayPalConnectionException $ex) {
                    // This will print the detailed information on the exception.
                    //REALLY HELPFUL FOR DEBUGGING
                    echo $ex->getData();
                }
     }
     public function compra(){
         return view("comprado");
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
