<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        return view("admin.users.index", [
            "page" => "users",
            "users" => User::all()
        ]);
    }

    public function create() {
        return view("admin.users.create", [
            "page" => "users"
        ]);
    }
    public function store() {

    }
}
