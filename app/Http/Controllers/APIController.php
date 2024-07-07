<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Provider;
use Illuminate\Http\Request;

class APIController extends Controller
{
    function delete_provider($id) {
        $user = Provider::find($id);
        $user->delete();
        
        return response()->json([
            'message' => 'Registro eliminado exitosamente'
        ], 200);
    }
}
