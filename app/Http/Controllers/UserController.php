<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/user/signin')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
          // aca usas Input::get('email'); y esas cosas pa guardar
          $user = new User;
          $user->first_name = Input::get('first_name'); 
          $user->last_name = Input::get('last_name'); 
          $user->email = Input::get('email'); 
          $user->password = md5(Input::get('password')); 
          $user->save();
         // Session::flash('message', 'Usuario creado'); no se que es XD
          Session::put('user_id', $user->id);
          Session::put('user', $user);
          return Redirect::to('/');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Session::get('user');
        $rules = array(
            'email' => 'unique:users,email,'.$user->id,
            'password'      => 'same:re_password'
        );
        $messages = [
            'same'    => 'Las contrase&ntilde;as no coinciden',
            'unique'    => 'Esa direcci&oacute;n de correo ya ha sido tomada.'
        ];
        $validator = Validator::make(Input::all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('/I')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            if(Input::get('first_name')!="")
                $user->first_name = Input::get('first_name'); 
            if(Input::get('last_name')!="")
                $user->last_name = Input::get('last_name');
            if(Input::get('email')!="") 
                $user->email = Input::get('email'); 
            if(Input::get('password')!="")   
                $user->password = md5(Input::get('password'));
            $ruta = "images";
            if ($request->hasFile('perfil_url')) {
                $profilePicture = $request->file('perfil_url');
                $extension = $profilePicture->getClientOriginalExtension();
                $fileName = md5(rand ( 0 , 1000)).".".$extension;
                $profilePicture->move($ruta, $fileName);
                $userprofilePicture = "/".$ruta."/".$fileName;
                DB::table('img_users')->insert(
    ['img' => $userprofilePicture, 'tipo' => 1, 'id_user' => $user->id]
);
            }

            if ($request->hasFile('portada_url')) {
                $portadaPicture = $request->file('portada_url');
                $extension = $portadaPicture->getClientOriginalExtension();
                $fileName = md5(rand ( 0 , 1000)).".".$extension;
                $portadaPicture->move($ruta, $fileName);
                $userportadaPicture = "/".$ruta."/".$fileName;
                DB::table('img_users')->insert(
    ['img' => $userportadaPicture, 'tipo' => 2, 'id_user' => $user->id]
);
            }


            /*if ($_FILES["imagen"]["error"] > 0){
                echo "ha ocurrido un error";
            } else {
                //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
                //y que el tamano del archivo no exceda los 100kb
                $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
                $limite_kb = 100;

                if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
                    //esta es la ruta donde copiaremos la imagen
                    //recuerden que deben crear un directorio con este mismo nombre
                    //en el mismo lugar donde se encuentra el archivo subir.php
                    $ruta = "imagenes/" . $_FILES['imagen']['name'];
                    //comprovamos si este archivo existe para no volverlo a copiar.
                    //pero si quieren pueden obviar esto si no es necesario.
                    //o pueden darle otro nombre para que no sobreescriba el actual.
                    if (!file_exists($ruta)){
                        //aqui movemos el archivo desde la ruta temporal a nuestra ruta
                        //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
                        //almacenara true o false
                        $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
                        if ($resultado){
                            echo "el archivo ha sido movido exitosamente";
                        } else {
                            echo "ocurrio un error al mover el archivo.";
                        }
                    } else {
                        echo $_FILES['imagen']['name'] . ", este archivo existe";
                    }
                } else {
                    echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
                }
            }
*/




            $user->save();
          return Redirect::to('/I');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /*--------------------------------------------*/
    public function showByEmail($email)
    {
        return User::where('email', '=', $email)->first();
    }
    public function login()
    {
         $rules = array(
            'email'         => 'required',
            'password'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/');
        }
        $email = Input::get('email');
        $password = Input::get('password');
        $user = $this->showByEmail($email);
        if($user==null){
            return Redirect::to('/')->withErrors(array('mensaje' => 'Email no registrado'));
        }else{
            if(md5($password) == $user->password){
                Session::put('user_id', $user->id);
                Session::put('user', $user);
                // dd(session('user_id'));
                // return Redirect::back();
                return Redirect::to('/');
            }else{
                 return Redirect::to('/')->withErrors(array('mensaje' => 'Password invalido'));
            }
        }
    }
    public function logout()
    {
        Session::flush();
        return Redirect::to('/');
    }

    public function seguir($seguido,$seguidor){
        $user_seguidor = User::find($seguidor);
        $user_seguido = User::find($seguido);
        if($user_seguido == null || $user_seguidor==null){
            echo json_encode(array('resultado' => 'error'));
        }
        $user_seguidor->seguir($seguido);

        echo json_encode(array('resultado' => 'ok'));
    }
    public function dejar_seguir($seguido,$seguidor){
        $user_seguidor = User::find($seguidor);
        $user_seguido = User::find($seguido);
        if($user_seguido == null || $user_seguidor==null){
            echo json_encode(array('resultado' => 'error'));
        }
        $user_seguidor->dejar_seguir($seguido);
        echo json_encode(array('resultado' => 'ok'));
    }
}
