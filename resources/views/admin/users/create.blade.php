@extends('layouts.admin')
@section("tittle")
  Registrar NuevO Usuario
@endsection
@section('admin-content')
  <div class="w-full p-0">
    <div class="flex justify-center">
      <h1 class="text-2xl font-inter font-bold">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Usuario
      </h1>
    </div>
    <div class="flex justify-center">
      <a 
        href="{{route("users")}}"
        class="flex gap-1 items-center p-1 font-inter font-bold border-pink-600 border-solid border-2 rounded
        text-pink-600 mt-3 hover:cursor-pointer hover:bg-pink-600 hover:text-white transition"
      >
        <i class="fa-solid fa-rotate-left text-lg"></i>
        Volver
      </a>
    </div>
  </div>
  <div class="mt-3 flex justify-center">
    <p>
      Llene el siguiente 
      <b>
        Formulario
      </b> 
      para registrar a un Usuario Nuevo en la Plataforma
    </p>
  </div>
  <div class="shadow-lg bg-white rounded mt-5 mx-80">
    <form 
      action="" 
      method="POST"
      class="p-5"
    >
      @include("admin.users.form")
      <div class="flex justify-end">
        <div class="text-blue-600 p-1 border-solid border-2 border-blue-600 rounded font-bold font-inter hover:cursor-pointer hover:text-white hover:bg-blue-600 transition w-44 flex justify-center items-center gap-1"
        >
          <i class="fa-solid fa-save text-lg"></i>
          <input 
            type="submit" 
            value="Registrar Usuario"
            class="hover:cursor-pointer"
          >
        </div>
      </div>
    </form>
  </div>
  <script>
    
  </script>
@endsection