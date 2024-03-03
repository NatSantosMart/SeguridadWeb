<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;


class UserController extends Controller
{

    public function createUser(){
        return view("user.create"); 
    }

    public function storeUser(Request $request){
        $name = $request->get('name'); 
        $surnames = $request->get('surnames'); 
        $dni = $request->get('dni'); 
        $email = $request->get('email'); 
        $password = $request->get('password'); 
        $repeatPassword = $request->get('repeatPassword'); 
        $phone = $request->get('phone'); 
        $country = $request->get('country'); 
        $IBAN = $request->get('IBAN'); 
        $aboutYou = $request->get('aboutYou');  

        $request->validate([
            'name' => 'required|min:2|max:20|regex:/^[^0-9]+$/',
            'surnames' => 'required|min:2|max:40|regex:/^[^0-9]+$/', 
            'dni' => 'required|regex:/^\d{8}[A-Za-z]$/',
            'email' => 'required|email|unique:users|', 
            'password' => 'required',
            'repeatPassword' => 'required',
            'phone' => 'min:9|max:12|regex:/^[0-9+]{9,12}$/', 
            'IBAN' => 'required|regex:/^ES\d{2}\s\d{4}\s\d{4}\s\d{2}\s\d{10}$/', 
            'aboutYou' => 'required|min:20|max:250|',
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
