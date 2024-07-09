<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StorageController extends Controller
{
    /**
     * Show storage's index view
     */
    public function index() {
        return view("admin.storage.index", [
            "page" => "storage"
        ]);
    }

    /**
     * 
     */
    public function create() {
        return view("admin.storage.create", [
            "page" => "storage"
        ]);
    }
}
