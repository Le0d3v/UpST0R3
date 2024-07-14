<?php
namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportsContoller extends Controller
{
    public function index() {
        return view("admin.reports.index", [
            "page" => "reports",
            "reports" => Report::orderByDesc("created_at")->paginate(15)
        ]);
    }
}
