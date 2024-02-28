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

        $request->validate([
            'name' => 'required|min:2|max:20', 
            'surnames' => 'required|min:2|max:40', 
            'dni' => 'required',
            'email' => 'required', 
        ]); 

        // $user = new User; 
        // $user -> name = $name; 
        // $user -> surnames = $surnames; 
        // $user -> dni = $dni; 
        // $user -> email = $email; 

        // $user->save();

        return redirect()->route('user.create')->with('success', '¡Usuario creado correctamente!'); 
    }
}
