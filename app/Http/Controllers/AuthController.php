<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function autenticar(Request $request)
    {
        $usr = $request->input('uuo');
        $pwd = $request->input('ovc');
        $credenciales = $request->validate([
            'uuo' => 'required',
            'ovc' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:captcha,0.9' 
        ]);

        if(Auth::attempt(['usu_nombre' => $usr, 'password' => $pwd])){
            $request->session()->regenerate();
            $usuario = Auth::user();
            if($usuario->usu_rol == '1'){ //ADMINISTRADOR
                return redirect('dashboard');
            }
            if($usuario->usu_rol == '2'){ //CLIENTE
                    return redirect('dashboard');
            }
        }

        return redirect('/');

    }

    public function logout(Request $request){
        Auth::logout();//elimina los datos de sesion del usuario
        $request->session()->invalidate(); //inicializa la sesion y genera un ID nuevo
        $request->session()->regenerateToken();//regenera el toke CSRF
        return redirect('/');
    }

    
}


// $2y$10$mFz0R4X37lVQf2T5ILqZF.hgNG822FahLnNvyjXXSJPsHBue/6XjK