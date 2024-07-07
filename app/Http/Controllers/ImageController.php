<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    public function store(Request $request) {
         $imagen = $request->file("file");   
         
         $nombreImagen = Str::uuid() . "." . $imagen->extension(); 
         $path = public_path("/uploads/products/" . $nombreImagen);
         $manager = new ImageManager(new Driver);
 
         $img = $manager->read($imagen);
         $img->resize(1024, 768);
         $img->save($path);
 
         //Contruir una respuesta para dropzone
         return response()->json(["imagen" => $nombreImagen]);
    }
}
