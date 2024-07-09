<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /** 
     * Show provider's index view
     */
    public function index() {
        return view("admin.providers.index", [
            "page" => "providers",
            "providers" => Provider::paginate(10)
        ]);
    }


    /**
     * Show provider's create view
     */
    public function create() {
        return view("admin.providers.create", [
            "page" => "providers",
        ]);
    }

    /**
     * Save a provider in the database
     */
    public function store(Request $request) {
        $request->validate([
            "name" => "required",
            "company" => "required",
            "telephone" => "required|numeric",
            "email" => "required|email"
        ]);

        Provider::create([
            "name" => $request->name,
            "company" => $request->company,
            "telephone" => $request->telephone,
            "email" => $request->email,
        ]);

        return redirect()->route("providers")->with('message', 'Proveedor Registrado Correctamente.');
    }

    /**
     * Show provider's edit view
     */
    public function edit(Provider $provider) {
        return view("admin.providers.edit", [
            "page" => "providers",
            "provider" => $provider
        ]);
    }

    /**
     * Update provider's data
     */
    public function update(Request $request, $id) {
        $request->validate([
            "name" => "required",
            "company" => "required",
            "telephone" => "required|numeric",
            "email" => "required|email"
        ]);

        $provider = Provider::findOrFail($id);
        $provider->update([
            "name" => $request->input("name"),
            "company" => $request->input("company"),
            "telephone" => $request->input("telephone"),
            "email" => $request->input("email"),
        ]);
        
        return redirect()->route("providers")->with('message', 'Información Actualizada Correctamente.');
    }

    /**
     * Delete a provider using provider's id
     */
    function delete($id) {
        $user = Provider::find($id);
        $user->delete();
        
        return response()->json([
            'message' => 'Registro eliminado exitosamente'
        ], 200);
    }
}
