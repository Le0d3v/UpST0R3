<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/** 
 * Show the login's view
 * @method view index() 
 * @method redirect store(Request $request)
*/
class AuthController extends Controller
{
    /** Returns login veiw 
     * @return mixed $view
    */
    public function index() {
        // Add a new user for tests
        // User::create([
        //     "name" => "Josue Flores",
        //     "email" => "jf023hreal@gmail.com",
        //     "password" => "12345678",
        //     "telephone" => "5578654310",
        //     "department" => "Dirección",
        //     "image" => "a",
        // ]); 

        return view("layouts.auth");
    }

    /**
     * Login function. This function validate if the user exists and redirect the user or show a error message
     */
    public function store(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8" 
        ]);

        $credentials = $request->only("email", "password");

        if(Auth::attempt($credentials)) {
            return redirect()->route("admin");
        } 
        
        return redirect()->route("login")->with("error", "Credenciales de Acceso Incorrectas");

    }
}