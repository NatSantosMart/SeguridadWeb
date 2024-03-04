<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;


class UserController extends Controller
{

    public function createUser(){
        $countries = Country::pluck('name', 'id');// Obtener todos los países de la base de datos
        return view("user.create", compact('countries')); // Pasar los países a la vista
    }

    public function storeUser(Request $request){
        $nombre = $request->get('name'); 
        $apellidos = $request->get('surnames'); 
        $dni = $request->get('dni'); 
        $email = $request->get('email'); 
        $contraseña = $request->get('password'); 
        $repetirContraseña = $request->get('repeatPassword'); 
        $telefono = $request->get('phone'); 
        $pais = $request->get('country'); 
        $iban = $request->get('IBAN'); 
        $sobreTi = $request->get('aboutYou');  

        $request->validate([
            'nombre' => 'required|min:2|max:20|regex:/^[^0-9]+$/',
            'apellidos' => 'required|min:2|max:40|regex:/^[^0-9]+$/', 
            'dni' => 'required|regex:/^\d{8}[A-Za-z]$/',
            'email' => 'required|email|unique:users|', 
            'contraseña' => 'required',
            'repetirContraseña' => 'required',
            'telefono' => 'min:9|max:12|regex:/^[0-9+]{9,12}$/', 
            'iban' => 'required|regex:/^ES\d{2}\s\d{4}\s\d{4}\s\d{2}\s\d{10}$/', 
            'sobreTi' => 'required|min:20|max:250|',
        ]); 

        $user = new User; 
        $user -> name = $name; 
        $user -> surnames = $surnames; 
        $user -> dni = $dni; 
        $user -> email = $email; 
        $user -> password = $password; 
        $user -> phone = $phone; 
        $user -> country = $country; 
        $user -> IBAN = $IBAN; 
        $user -> aboutYou = $aboutYou; 

        $user->save();

        return redirect()->route('user.create')->with('success', '¡Usuario creado correctamente!'); 
    }
}
