<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Report;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /** 
     * Show provider's index view
     */
    public function index(Request $request) {
        $query = $request->input("query");
        if($query) {
            $providers = Provider::where('name', 'LIKE', "%{$query}%")->get();
            return view("admin.providers.index", [
                "page" => "providers",
                "providers" => $providers,
                "search" => $query
            ]);
        } else {
            $providers = Provider::paginate(10);
        }

        return view("admin.providers.index", [
            "page" => "providers",
            "providers" => $providers
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

        Report::create([
            "title" => "Registro de nuevo Proveedor",
            "message" => "Se ha registrado un nuevo proveedor. El nuevo proveedor es " . $request->name . " de la compañía " . $request->company . "."
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

        Report::create([
            "title" => "Actualización de Proveedor",
            "message" => "Se actualizó la información del provedor $request->name de $request->company."
        ]);
        
        return redirect()->route("providers")->with('message', 'Información Actualizada Correctamente.');
    }

    /**
     * Delete a provider using provider's id
     */
    function delete($id) {
        $user = Provider::find($id);

        Report::create([
            "title" => "Eliminación de Proveedor",
            "message" => "Se eliminó al proveedor ($user->name de $user->company)."
        ]);

        $user->delete();

        
        return response()->json([
            'message' => 'Registro eliminado exitosamente'
        ], 200);
    }
}
