@extends('layouts.admin')
@section('tittle')
    Administración de Almacén
@endsection
@section('admin-content')
    <div class="flex justify-center">
        <h1 class="text-2xl font-bold font-inter">
        <i class="fa-solid fa-box"></i>
        Inventario
        </h1>
    </div>
    <div class="flex justify-center">
        <a 
        href="{{route("storage.create")}}"
        class="flex items-center gap-1 p-1 mt-5 font-bold text-pink-600 transition border-2 border-pink-600 border-solid rounded font-inter hover:cursor-pointer hover:bg-pink-600 hover:text-white"
        >
        <i class="text-lg fa-solid fa-circle-plus"></i>
        Añadir Registro
        </a>
    </div>
    @if (session("message"))
      <div class="flex justify-center mt-2" id="warning">
        <div class="flex gap-2">
          <p class="w-full p-2 mt-2 font-bold text-green-600 uppercase bg-green-300 border-l-8 border-green-700 rounded-md">
            <i class="fa-solid fa-circle-check"></i>
            {{session("message")}}
          </p>
        </div>
      </div>
    @endif
    <div class="flex justify-between items-center">
      <h1 class="mt-3 mb-6 font-bold text-pink-500 uppercase font-inter">
        Productos y Elementos existentes:
      </h1>
      <form action="{{route("storage")}}" method="GET" class="flex items-center">
        <input type="text" name="query" placeholder="Buscar Producto" value="{{$search ?? ""}}" class="border-solid border-2 p-2">
        <div class="bg-gray-300 px-1 hover:cursor-pointer py-2 hover:bg-gray-400">
          <i class="fa-solid fa-search"></i>
          <input type="submit" value="Buscar" class="cursor-pointer">
        </div>
      </form>
    </div>
    @if (count($products) < 0)
      <p class="text-center text-gray-400">
        Sin Registros Existentes
      </p>
    @endif
    <div class="grid grid-cols-4 gap-5 p-1 mt-3 mb-3">
        @foreach ($products as $product)
          <div 
            class="flex items-center p-3 transition bg-gray-200 border-t-8 border-pink-700 rounded shadow-xl hover:scale-105"
          >
            <div class="">
              <h2 class="text-2xl font-bold text-center text-pink-500 font-inter font-gray-400">
                {{$product->name}}
              </h2>
              <img 
                src="{{asset("uploads/products/$product->image")}}" 
                alt="imagenn-producto" 
                class="mt-1"
                loading="lazy"
              >
              <div class="flex justify-between mt-3">
                <p class="font-inter">{{$product->unities}} Unidades</p>
                <p class="font-inter">{{$product->created_at->diffForHumans()}}</p>
              </div>
              <p class="text-lg font-bold text-center">
                {{$product->provider->company}}
              </p>
              <div class="flex justify-center mt-5">
                <a 
                  href="{{route("storage.show", $product)}}" 
                  class="px-2 py-1 mr-2 text-xl text-white bg-green-500 rounded hover:bg-green-700" 
                  title="Ver Más"
                >
                  <div class="flex justify-center">
                    <i class="fa-solid fa-eye"></i>
                  </div>
                  <p class="text-sm">Ver Más</p>
                </a>
                <a href="{{route("storage.edit", $product->id)}}" class="px-2 py-1 mr-1 text-xl text-white bg-blue-500 rounded hover:bg-blue-700" title="Editar">
                  <div class="flex justify-center">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </div>
                  <p class="text-sm">Editar</p>
                </a>
                <button 
                  class="px-2 py-1 ml-1 text-xl text-white bg-red-500 rounded hover:bg-red-700"
                  onclick="eliminar({{$product->id}})"
                >
                  <div class="flex justify-center">
                    <i class="fa-solid fa-trash"></i>
                  </div>
                  <p class="text-sm">Eliminar</p>
                </button>
              </div>
            </div>
          </div>
        @endforeach
    </div>
    @if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
      {{$products->links()}}
    @endif
    <script>
      const warning = document.querySelector("#warning");
      setTimeout(() => {
        warning.style.display = "none"
      }, 5000);
      
      function eliminar(id) {
        Swal.fire({
          title: "¿Estás Seguro de Eliminar?",
          text: "Una vez eliminado no podrá recuperarse",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          cancelButtonText: "Cancelar",
          confirmButtonText: "Si, eliminar"
        }).then((result) => {
          if (result.isConfirmed) {
            deleteProduct(id);
          }
        });
      }

      async function deleteProduct(id) {
        try { 
          const url = `/storage/delete/${id}`;
          const request = await fetch(url, {
            method: 'DELETE',
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            }
          });

          const result = await request.json()
          
          Swal.fire({
              icon: "success",
              title: "Eliminado Exitosamente",
              text: "El Proveedor ha sido Eliminado Exitosamente",
          }).then(() => {
              window.location.reload();
          });

        } catch (error) {
          Swal.fire({
              icon: "error",
              tittle: "Error al Eliminar",
              text: "Ha ocurrido un error al eliminar el proveedor",
          });
        }
      }
    </script>
@endsection