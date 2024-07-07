@extends("layouts.admin")
@section("tittle")
  Registrar Nuevo Proveedor
@endsection
@section("admin-content")
<div class="w-full p-0">
  <div class="flex justify-center">
    <h1 class="text-2xl font-inter font-bold">
      <i class="fa-solid fa-circle-plus"></i>
      Registrar Nuevo Proveedor
    </h1>
  </div>
  <div class="flex justify-center">
    <a 
      href="{{route("providers")}}"
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
<div class="flex justify-center p-2 bg-white rounded mx-auto mt-6 w-1/3 shadow-xl">
  <form 
    action="{{route("providers.create")}}"
    method="POST"
    class="w-full p-3"
  >
    @csrf
    @include("admin.providers.form")
    @include("components.save-button")
  </form>
</div>
@endsection