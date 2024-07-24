@extends('layouts.admin')
@section("tittle")
  Panel de Administración
@endsection
@section("admin-content")
  <div class="flex justify-center mb-3">
    <h1 class="text-2xl font-bold font-inter">
      <i class="fa-solid fa-home"></i>
      Panel de Administración
    </h1>
  </div>
  <div class="flex justify-between w-full gap-5 p-1">
    <div class="grid w-2/6 grid-rows-2 gap-3">
      <div class="w-full p-2 text-white bg-yellow-400 rounded-lg shadow-lg">
        <h1 class="text-2xl text-center text-black font-inter">
          Cantidad Total de Registros:
        </h1>
        <div class="flex items-center justify-center h-100">
          <p class="font-bold text-center text-black text-9xl font-inter">
            {{$count}}
          </p>
        </div>
      </div>
      <div class="w-full p-2 text-white bg-pink-700 rounded-lg shadow-lg">
        <h1 class="text-2xl text-center text-white font-inter">
          Proveedores Existentes:
        </h1>
        <div class="flex items-center justify-center h-100">
          <p class="font-bold text-center text-whte text-9xl font-inter">
            {{$count_providers}}
          </p>
        </div>
      </div>
      <div class="w-full p-2 text-white bg-blue-600 rounded-lg shadow-lg">
        <h1 class="mb-1 text-2xl font-bold text-center text-white font-inter">
          Últimos Movimientos:
        </h1>
        <ul>
          @foreach ($processes as $process)
            <li class="flex items-center gap-1 mb-1">
              <div class="w-2 h-2 bg-white rounded-full"></div>
              <p class="font-inter text-md">
                {{$process->title}} - {{$process->created_at->format("d/M/Y")}}
              </p>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="w-4/6 bg-gray-200 rounded-lg shadow-lg h-100">
      <h1 class="p-1 text-lg font-bold text-center font-inter">
        División de Registros por Categroría
      </h1>
      <div class="p-2">
        <canvas id="pieChart" height="450"></canvas>
      </div>
    </div>
  </div>
@endsection