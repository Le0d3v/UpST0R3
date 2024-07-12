@extends('layouts.admin')
@section("tittle")
    Reportes
@endsection
@section('admin-content')
  <div class="flex justify-center">
    <h1 class="text-2xl font-bold font-inter">
      <i class="fa-solid fa-clipboard-list"></i>
      Reportes de Movimientos
    </h1>
  </div>
  <div class="flex w-full gap-10 p-3 mt-5">
    <div class="w-1/2 p-2 bg-white rounded-md shadow-lg">
        <h1 class="m-0 text-2xl font-bold text-center text-pink-500 font-inter">
            Entradas
        </h1>
        <div class="flex justify-center w-auto">
            <a 
                href="{{route("providers.create")}}"
                class="flex items-center gap-1 p-1 mt-5 font-bold text-pink-600 transition border-2 border-pink-600 border-solid rounded font-inter hover:cursor-pointer hover:bg-pink-600 hover:text-white"
            >
                <i class="text-lg fa-solid fa-circle-plus"></i>
                Añadir Reporte
            </a>
        </div>
    </div>
    <div class="w-1/2 p-2 bg-white rounded-md shadow-lg">
        <h1 class="text-2xl font-bold text-center text-pink-500 font-inter">
            Salidas
        </h1>
        <div class="flex justify-center w-auto">
            <a 
                href="{{route("outputs.create")}}"
                class="flex items-center gap-1 p-1 mt-5 font-bold text-pink-600 transition border-2 border-pink-600 border-solid rounded font-inter hover:cursor-pointer hover:bg-pink-600 hover:text-white"
            >
                <i class="text-lg fa-solid fa-circle-plus"></i>
                Añadir Reporte
            </a>
        </div>
    </div>
  </div>
@endsection