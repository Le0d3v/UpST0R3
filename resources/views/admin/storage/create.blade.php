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
  <div class="mt-3 flex justify-center">
    <p>
      Llene el siguiente 
      <b>
        Formulario
      </b> 
      para registrar a un Proveedor Nuevo en la Plataforma
    </p>
  </div>
  <div class="flex justify-between mt-10 w-full gap-10 px-3">
    <div class="w-1/2">
      @error("image")
        <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-1">
          <i class="fa-solid fa-circle-xmark"></i>
          {{$message}}
        </p>
      @enderror
      <form 
        action="{{route("image.store")}}"
        method="POST"
        enctype="multipart/form-data"
        id="dropzone"
        class="dropzone border-dashed border-gray-500 w-full border-4 rounded h-2/3 flex justify-center items-center
          @error("image")
            border-red-500
          @enderror"
      >
        @csrf
      </form>
    </div> 
    <div class="p-3 bg-white rounded-none shadow-lg w-1/2">
      <form 
        action=""
        method="POST"
      > 
        @csrf
        @include("admin.storage.form")
        @include("components.save-button")
      </form>
    </div>
  </div>
@endsection