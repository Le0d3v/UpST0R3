@extends('layouts.admin')
@section("tittle")
  Panel de Administración
@endsection
@section("admin-content")
  <div class="flex p-1 justify-between w-full gap-5">
    <div class="grid grid-rows-2 gap-3 w-1/2">
      <div class="w-full bg-white shadow-lg rounded-lg h-full">
        <h1>Info</h1>
      </div>
      <div class="w-full bg-white shadow-lg rounded-lg">
        <h1>Info</h1>
      </div>
    </div>
    <div class="w-1/2 bg-white shadow-lg rounded-lg h-full">
      Grafica
    </div>
  </div>
@endsection