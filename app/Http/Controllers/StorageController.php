<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Product;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    /**
     * Show storage's index view
     */
    public function index(Request $request) {
        $query = $request->input("query");
        if($query) {
            $products = Product::where('name', 'LIKE', "%{$query}%")->get();
            return view("admin.storage.index", [
                "page" => "storage",
                "products" => $products,
                "search" => $query
            ]);
        } else {
            $products = Product::paginate(8);
        }

        return view("admin.storage.index", [
            "page" => "storage",
            "products" => $products
        ]);
    }

    public function show(Product $product) {
        return view("admin.storage.show", [
            "page" => "storage",
            "product" => $product
        ]);
    }

    /**
     * 
     */
    public function create() {
        return view("admin.storage.create", [
            "page" => "storage",
            "categories" => Category::all(),
            "providers" => Provider::all(),
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            "name" => "required",
            "unities" => "required|numeric",
            "image" => "required",
            "category_id" => "required",
            "provider_id" => "required",
        ]);

        Product::create([
            "name" => $request->name,
            "unities" => $request->unities,
            "image" => $request->image,
            "category_id" => $request->category_id,
            "provider_id" => $request->provider_id
        ]);

        Report::create([
            "title" => "Registro de Nuevo Producto",
            "message" => "Se ha registrado un nuevo Producto. El nuevo producto es " . $request->name . " con $request->unities unidades."
        ]);

        return redirect()->route("storage")->with("message", "Producto Registrado Correctamente");
    }

    public function edit($id) {
        $product = Product::find($id);

        return view("admin.storage.edit", [
            "page" => "storage",
            "product" => $product,
            "categories" => Category::all(),
            "providers" => Provider::all(),
        ]);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update([
            "name" => $request->name,
            "unities" => $request->unities,
            "image" => $request->image,
            "category_id" => $request->category_id,
            "provider_id" => $request->provider_id,
            "total_price" => $request->total_price
        ]);

        Report::create([
            "title" => "Actualización de Producto",
            "message" => "Se actualizó la información del Producto $product->name."
        ]);

        return redirect()->route("storage")->with("message", "Producto Actualizado Correctamente");
    }   

    public function delete($id) {
        $product = Product::find($id);

        Report::create([
            "title" => "Eliminación de Producto",
            "message" => "Se eliminó el producto $product->name de la plataforma."
        ]);
        
        $product->delete();
        
        return response()->json([
            'message' => 'Registro eliminado exitosamente'
        ], 200);
    }
}
