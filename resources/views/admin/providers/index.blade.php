@extends("layouts.admin")
@section("tittle")
  Administración de Proveedores
@endsection
@section("admin-content")
  <div class="flex justify-center">
    <h1 class="text-2xl font-bold font-inter">
      <i class="fa-solid fa-truck-front"></i>
      Proveedores
    </h1>
  </div>
  <div class="flex justify-center">
    <a 
      href="{{route("providers.create")}}"
      class="flex items-center gap-1 p-1 mt-5 font-bold text-pink-600 transition border-2 border-pink-600 border-solid rounded font-inter hover:cursor-pointer hover:bg-pink-600 hover:text-white"
    >
      <i class="text-lg fa-solid fa-circle-plus"></i>
      Añadir Proveedor
    </a>
  </div>
  @if (session("message"))
    <div class="flex justify-center mt-2" id="war">
      <div class="flex gap-2">
        <p class="w-full p-2 mt-2 font-bold text-green-600 uppercase bg-green-300 border-l-8 border-green-700 rounded-md">
          <i class="fa-solid fa-circle-check"></i>
          {{session("message")}}
        </p>
      </div>
    </div>
  @endif
  <div class="w-full p-2">
    <table class="w-full p-1 mb-10 border-none">
      <h1 class="mt-3 mb-3 font-bold text-pink-500 uppercase font-inter">Proveedores Registrados:</h1>
      <thead class="p-3 font-bold text-white bg-pink-700">
        <th class="p-2">ID</th>
        <th class="p-2">Nombre</th>
        <th class="p-2">Empresa/Comañía</th>
        <th class="p-2">Teléfono</th>
        <th class="p-2">Correo Electrónico</th>
        <th class="p-2">Acciones</th>
      </thead>
      <tbody>
          @foreach ($providers as $provider)
            <tr class="p-3 mb-3 text-center border-b-2 border-gray-200">
              <td class="p-2 font-inter">{{$provider->id}}</td>
              <td class="p-2 font-inter">{{$provider->name}}</td>
              <td class="p-2 font-inter">{{$provider->company}}</td>
              <td class="p-2 font-inter">{{$provider->telephone}}</td>
              <td class="p-2 font-inter">{{$provider->email}}</td>
              <td class="p-2 font-inter">
                <div class="text-center">
                  <a 
                    href="{{route("providers.edit", $provider->id)}}" 
                    class="p-1 mr-1 text-xl text-white bg-blue-500 rounded hover:bg-blue-700" 
                    title="Editar"
                  >
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button 
                    class="px-2 py-1 ml-1 text-xl text-white bg-red-500 rounded hover:bg-red-700" 
                    title="Eliminar" 
                    onclick="eliminar({{$provider->id}})"
                  >
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
          @endforeach
      </tbody>
    </table>
    {{$providers->links()}}
  </div>

  <script>
    const war = document.querySelector("#war");
    setTimeout(() => {
      war.style.display = "none"
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
          deleteProvider(id);
        }
      });
    }

    async function deleteProvider(id) {
      try { 
        const url = `/providers/delete/${id}`;
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