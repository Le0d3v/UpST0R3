<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index() {
        return view("admin.providers.index", [
            "page" => "providers",
            "providers" => Provider::paginate(10)
        ]);
    }

    public function create() {
        return view("admin.providers.create", [
            "page" => "providers",
        ]);
    }

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

    public function edit(Provider $provider) {
        return view("admin.providers.edit", [
            "page" => "providers",
            "provider" => $provider
        ]);
    }

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
}
