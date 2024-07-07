<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ReportsContoller extends Controller
{
    public function index() {
        return view("admin.reports.index", [
            "page" => "reports"
        ]);
    }
}
