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
        $nombre = $request->get('nombre'); 
        $apellidos = $request->get('apellidos'); 
        $dni = $request->get('dni'); 
        $email = $request->get('email'); 
        $contraseña = $request->get('contraseña'); 
        $repetirContraseña = $request->get('repetirContraseña'); 
        $telefono = $request->get('telefono'); 
        $pais = $request->get('pais'); 
        $iban = $request->get('iban'); 
        $sobreTi = $request->get('sobreTi');  

        $request->validate([
            'nombre' => 'required|min:2|max:20|regex:/^[^0-9]+$/',
            'apellidos' => 'required|min:2|max:40|regex:/^[^0-9]+$/', 
            'dni' => 'required|regex:/^\d{8}[A-Za-z]$/',
            'email' => 'required|email|unique:users|', 
            'contraseña' => 'required',
            'repetirContraseña' => 'required',
            'telefono' => 'nullable|min:9|max:12|regex:/^[0-9+]{9,12}$/', 
            'iban' => 'required|regex:/^ES\d{2}\d{4}\d{4}\d{2}\d{10}$/', 
            'sobreTi' => 'nullable|min:20|max:250|',
        ]); 

        $user = new User; 
        $user -> name = $nombre; 
        $user -> surnames = $apellidos; 
        $user -> dni = $dni; 
        $user -> email = $email; 
        $user -> password = $contraseña; 
        $user -> IBAN = $iban; 

        //Campos opcionales
        if($pais != "Selecciona un país"){
            $user -> country = $pais; 
        }
        if($pais != null){
            $user -> aboutYou = $sobreTi; 
        }
        if($telefono != null){
            $user -> phone = $telefono; 
        }

        $user->save();

        return redirect()->route('user.create')->with('success', '¡Usuario creado correctamente!'); 
    }
}
