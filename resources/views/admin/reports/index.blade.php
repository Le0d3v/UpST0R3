@extends('layouts.admin')
@section("tittle")
    Bitácora
@endsection
@section('admin-content')
  <div class="flex justify-center">
    <h1 class="text-2xl font-bold font-inter">
      <i class="fa-solid fa-clipboard-list"></i>
      Bitácora de Movimientos
    </h1>
    </div>
    <p class="flex justify-center mt-3 text-gray-400 font-inter">
        Visualice todas las operaciones realizadas en UpStore
    </p>
    <div class="flex justify-between">
        <div class="w-full flex justify-start pl-10">
            <h1 class="text-3xl text-gray-300 font-inter font-bold">
                Proceso
            </h1>
        </div>
        <div class="w-full flex justify-end">
            <h1 class="text-3xl text-gray-300 font-inter font-bold">
                Fecha y Hora
            </h1>
        </div>
    </div>
    <div class="w-full p-3">
        @foreach ($reports as $report)
            <div class="p-3 border-b-2">
                <h1 class="font-inter font-bold text-pink-500 text-xl">
                    {{$report->title}}
                </h1>
                <div class="flex justify-between gap-5">
                    <p class="text-sm">
                        {{$report->message}}
                    </p>
                    <p class="font-bold text-sm">
                        {{$report->created_at->format("d/m/Y") . " - " . $report->created_at->format("H:i")}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    {{$reports->links()}}
@endsection