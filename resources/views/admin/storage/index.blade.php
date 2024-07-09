@extends('layouts.admin')
@section('tittle')
    Administración de Almacén
@endsection
@section('admin-content')
    <div class="flex justify-center">
        <h1 class="text-2xl font-inter font-bold">
        <i class="fa-solid fa-box"></i>
        Inventario
        </h1>
    </div>
    <div class="flex justify-center">
        <a 
        href="{{route("storage.create")}}"
        class="flex gap-1 items-center p-1 font-inter font-bold border-pink-600 border-solid border-2 rounded
        text-pink-600 mt-5 hover:cursor-pointer hover:bg-pink-600 hover:text-white transition"
        >
        <i class="fa-solid fa-circle-plus text-lg"></i>
        Añadir Registro
        </a>
    </div>
    <h1 class="mt-3 mb-6 uppercase font-inter text-pink-500 font-bold">Productos y Elementos existentes:</h1>
    <div class="p-1 mt-3 grid grid-cols-4 gap-3">
        <div class="w-full bg-green-300">
        </div>
        <div class="w-full bg-green-300">
        </div>
        <div class="w-full bg-green-300">
        </div>
        <div class="w-full bg-green-300">
        </div>
    </div>
@endsection