<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    /**
     * Show storage's index view
     */
    public function index() {
        return view("admin.storage.index", [
            "page" => "storage",
            "products" => Product::paginate(8)
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

        return redirect()->route("storage")->with("message", "Producto Registrado Correctamente");
    }
}
