@extends("layouts.admin")
@section("tittle")
  Registrar nuevo Producto
@endsection
@section("admin-content")
  <div class="w-full p-0">
    <div class="flex justify-center">
      <h1 class="text-2xl font-inter font-bold">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Nuevo Registro
      </h1>
    </div>
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
  </div>
@endsection