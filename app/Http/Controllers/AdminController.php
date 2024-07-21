<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Report;
use App\Models\Provider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $products = Product::all();

        return view("admin.index", [
            "page" => "home",
            "processes" => Report::orderByDesc("created_at")->limit(3)->get(),
            "count" => count(Product::all()),
            "count_providers" => count(Provider::all())
        ]);
    }

    public function logout() {
        auth()->logout();
        return redirect()->route("login");
    }

    public function getProducts() {
        $refrigeratedFoods = Product::where("category_id", "1")->get();
        $unrefrigeratedFoods = Product::where("category_id", "2")->get();
        $cleaningProducts = Product::where("category_id", "3")->get();
        $stationeryProducts = Product::where("category_id", "4")->get();
        $homeApliances = Product::where("category_id", "5")->get();
        $drinks = Product::where("category_id", "6")->get();
        $pharmacologyProducts = Product::where("category_id", "7")->get();

        $data = [
            "Productos Refrigerados" => count($refrigeratedFoods),
            "Productos No Refrigerados" => count($unrefrigeratedFoods),
            "Productos de Limpieza" => count($cleaningProducts),
            "Productos de Papelería" => count($stationeryProducts),
            "Electrodomésticos" => count($homeApliances),
            "Aguas y Bebidas" => count($drinks),
            "Productos de Farmacología" => count($pharmacologyProducts),
        ];

        return response()->json($data);
    }
}
