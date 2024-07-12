@extends("layouts.admin")
@section('title')
  {{$product->name}}
@endsection
@section("admin-content")
  <h1 class="text-pink-500 font-inter font-bold text-center text-3xl">{{$product->name}}</h1>
  <div class="flex justify-center">
    <a 
      href="{{route("storage")}}"
      class="flex gap-1 items-center p-1 font-inter font-bold border-pink-600 border-solid border-2 rounded
      text-pink-600 mt-3 hover:cursor-pointer hover:bg-pink-600 hover:text-white transition"
    >
      <i class="fa-solid fa-rotate-left text-lg"></i>
      Volver
    </a>
  </div>
  <div class="flex p-3 justify-between mt-5 gap-5">
    <div class="w-1/2 bg-gray-100 rounded-lg shadow-lg p-3">
      <h2 class="text-center text-pink-500 font-inter font-bold text-2xl p-1">
        Imágen del Producto
      </h2>
      <img src="{{asset("uploads/products/$product->image")}}" alt="">
    </div>
    <div class="w-1/2 p-3 bg-gray-100 rounded-lg shadow-lg">
      <h1 class="text-center text-2xl text-pink-500 font-inter font-bold">
        Características
      </h1>
      <ul class="mt-5">
        <li class="text-lg font-inter mb-3">
          Nombre del Producto:
          <span class="font-inter font-bold text-cyan-500">
            {{$product->name}}
          </span>
        </li>
        <li class="text-lg font-inter mb-3">
          Tipo de Producto:
          <span class="font-inter font-bold text-cyan-500">
            {{$product->category->category}}
          </span>
        </li>
        <li class="text-lg font-inter mb-3">
          Unidades existentes:
          <span class="font-inter font-bold text-cyan-500">
            {{$product->unities}} 
          </span>
        </li>
      </ul>
      <h2 class="font-bold font-inter text-center text-xl text-pink-500">
        Datos del Peroveedor
      </h2>
      <ul class="mt-5">
        <li class="text-lg font-inter mb-3">
          Nombre del Proveedor:
          <span class="font-inter font-bold text-cyan-500">
            {{$product->provider->name}}
          </span>
        </li>
        <li class="text-lg font-inter mb-3">
          Compañía o Empresa:
          <span class="font-inter font-bold text-cyan-500">
            {{$product->provider->company}}
          </span>
        </li>
        <li class="text-lg font-inter mb-3">
          Telefóno:
          <span class="font-inter font-bold text-cyan-500">
            {{$product->provider->telephone}} 
          </span>
        </li>
        <li class="text-lg font-inter mb-3">
          Correo Electrónico:
          <span class="font-inter font-bold text-cyan-500">
            {{$product->provider->email}} 
          </span>
        </li>
      </ul>
    </div>
  </div>
@endsection