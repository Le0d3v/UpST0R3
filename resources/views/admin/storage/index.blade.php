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
    @if (session("message"))
      <div class="flex justify-center mt-2">
        <div class="flex gap-2">
          <p class="p-2 bg-green-300 text-green-600 w-full rounded-md border-l-8 border-green-700 mt-2 
          uppercase font-bold">
            <i class="fa-solid fa-circle-check"></i>
            {{session("message")}}
          </p>
        </div>
      </div>
    @endif
    <h1 class="mt-3 mb-6 uppercase font-inter text-pink-500 font-bold">Productos y Elementos existentes:</h1>
    @if (count($products) < 0)
      <p class="text-center text-gray-400">
        Sin Registros Existentes
      </p>
    @endif
    <div class="p-1 mt-3 grid grid-cols-4 gap-3">
        @foreach ($products as $product)
          <div class="p-3 border-t-8 border-pink-700 rounded bg-gray-200 shadow-xl transition">
            <h2 class="text-center font-inter font-bold font-gray-400 text-2xl text-pink-500">
              {{$product->name}}
            </h2>
            <img src="{{asset("uploads/products/$product->image")}}" alt="imagenn-producto" class="mt-1">
            <div class="flex justify-between mt-3">
              <p class="font-inter">{{$product->unities}} Unidades</p>
              <p class="font-inter">{{$product->created_at->diffForHumans()}}</p>
            </div>
            <div class="flex justify-center mt-5">
              <a href="#" class="bg-green-500 py-1 px-2 text-white rounded text-xl hover:bg-green-700 mr-2" title="Ver Más">
                <div class="flex justify-center">
                  <i class="fa-solid fa-eye"></i>
                </div>
                <p class="text-sm">Ver Más</p>
              </a>
              <a href="#" class="bg-blue-500 py-1 px-2 text-white rounded text-xl mr-1 hover:bg-blue-700" title="Editar">
                <div class="flex justify-center">
                  <i class="fa-solid fa-pen-to-square"></i>
                </div>
                <p class="text-sm">Editar</p>
              </a>
              <button 
                class="bg-red-500 text-white rounded py-1 px-2 ml-1 text-xl hover:bg-red-700"
                onclick="alert('Hola')"
              >
                <div class="flex justify-center">
                  <i class="fa-solid fa-trash"></i>
                </div>
                <p class="text-sm">Eliminar</p>
              </button>
            </div>
          </div>
        @endforeach
    </div>
    {{$products->links()}}
@endsection