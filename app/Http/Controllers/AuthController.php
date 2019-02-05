<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller

//Metodo de Registro utilizado en la aplicacion Android y La Pagina Web!
{
    public function signup(Request $request)
    {
        $this->validate($request,[
            'nombre_completo'=> 'required|max:100|string',
            'name'=> 'required|max:20|string|unique:users',
            'cod_usuario'=> 'required|max:13|string|unique:users',
            'email'=> 'required|string|email|unique:users',
            'password'=>'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\X]).*$/|confirmed',

        ]);
        $user = new User([
            'nombre_completo'=> $request->nombre_completo,
            'name'=> $request->name,
            'cod_usuario'=> $request->cod_usuario,
            'email'=> $request->email,
            'carrera_id'=> $request->carrera_id,
            'password' => bcrypt($request->password),
            'rol_id' =>2,
        ]);
        $user->save();

        if (isset($_POST['rol_id'])){
            return redirect('/LoginWebb');
        }else {
            return response()->json([
                'message' => 'Registro Exitoso!']);
        }

    }



    //Metodos verificacion de datos utilizados en la aplicacion Android y La Pagina Web!
    public function verifyEmail(Request $request)
    {
        if (isset($request->idUser)){
            $cuenta = User::select('id')
                ->where('email',$request->correo)
                ->where('id',$request->idUser)
                ->get();

            if (count($cuenta) == 1){
                return 0;
            }else {
                $cont = User::select('id')
                    ->where('email',$request->correo)
                    ->get();

                return count($cont);
            }
        }


        $cont = User::select('id')
            ->where('email',$request->correo)
            ->get();

        return count($cont);
    }

    public function verifyNameUser(Request $request)
    {
        if (isset($request->idUser)){
            $cuenta = User::select('id')
                ->where('name',$request->user)
                ->where('id',$request->idUser)
                ->get();

            if (count($cuenta) == 1){
                return 0;
            }else {
                $cont = User::select('id')
                    ->where('name',$request->user)
                    ->get();

                return count($cont);
            }
        }

        $cont = User::select('id')
            ->where('name',$request->user)
            ->get();

        return count($cont);
    }

    public function verifyNumCuen(Request $request)
    {
        if (isset($request->idUser)){
            $cuenta = User::select('id')
                ->where('cod_usuario',$request->cuenta)
                ->where('id',$request->idUser)
                ->get();

            if (count($cuenta) == 1){
                return 0;
            }else {
                $cont = User::select('id')
                    ->where('cod_usuario',$request->cuenta)
                    ->get();

                return count($cont);
            }
        }

        $cont = User::select('id')
            ->where('cod_usuario',$request->cuenta)
            ->get();

        return count($cont);
    }


    public function reset(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required|string|email',
            'password' => 'required|string|confirmed'
        ]);

        User::where('email', $request->email)
            ->update(['password' => bcrypt($request->password)]);
        $json = "Contraseña Restaurada";

        return view('exito', compact('json'));
    }





    //Metodo de Login utilizado en la aplicacion Android y La Pagina Web!
    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required|string|email',
            'password'=> 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {

            if (isset($_POST['web'])){
                return redirect('/errordelogueo');
            }else{
                return response()->json([
                    'message' => 'Usuario o contraseña incorrecta'], 401);
            }
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        $rol = User::select("rol_id")->where("email",$request->email)->first();
        $id = User::select("id")->where("email",$request->email)->first();
        if (isset($_POST['web'])){
            return redirect('/home');
        }else{
            return response()->json([
                'id'=>$id->id,
                'rol' => $rol->rol_id,
                'access_token' => $tokenResult->accessToken,
                'token_type'   => 'Bearer',
                'expires_at'   => Carbon::parse(
                    $tokenResult->token->expires_at)
                    ->toDateTimeString(),
            ]);


        }
        /**/
    }

    /*
    public function signupweb(Request $request)
    {
        $this->validate($request,[
            'nombre_completo'=> 'required|max:100|string',
            'name'=> 'required|max:20|string|unique:users',
            'cod_usuario'=> 'required|max:5|string|unique:users',
            'email'=> 'required|string|email|unique:users',
            'password'=>'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\X]).*$/|confirmed',
            'rol_id' =>'required|integer',
        ]);
        $user = new User([
            'nombre_completo'=> $request->nombre_completo,
            'name'=> $request->name,
            'cod_usuario'=> $request->cod_usuario,
            'email'    => $request->email,
            'carrera_id'=> 1,
            'password' => bcrypt($request->password),
            'rol_id' =>2,
        ]);
        $user->save();
        return redirect('/LoginWeb');
    }
    public function loginweb(Request $request)
    {
        $request->validate([
            'email'=> 'required|string|email',
            'password'=> 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return redirect('/errordelogueo');
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        $rol = User::select("rol_id")->where("email",$request->email)->first();
        if (isset($_POST['web'])){
            return redirect('/home');
        }else{
            return response()->json([
                'rol' => $rol->rol_id,
                'access_token' => $tokenResult->accessToken,
                'token_type'   => 'Bearer',
                'expires_at'   => Carbon::parse(
                    $tokenResult->token->expires_at)
                    ->toDateTimeString(),
            ]);
    }
}
    */

}
