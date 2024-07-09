@extends("layouts.admin")
@section("tittle")
  Administración de Proveedores
@endsection
@section("admin-content")
  <div class="flex justify-center">
    <h1 class="text-2xl font-inter font-bold">
      <i class="fa-solid fa-truck-front"></i>
      Proveedores
    </h1>
  </div>
  <div class="flex justify-center">
    <a 
      href="{{route("providers.create")}}"
      class="flex gap-1 items-center p-1 font-inter font-bold border-pink-600 border-solid border-2 rounded
      text-pink-600 mt-5 hover:cursor-pointer hover:bg-pink-600 hover:text-white transition"
    >
      <i class="fa-solid fa-circle-plus text-lg"></i>
      Añadir Proveedor
    </a>
  </div>
  @if (session("message"))
    <div class="flex justify-center mt-2">
      <div class="flex gap-2">
        <p class="p-2 bg-green-300 text-green-600 w-full rounded-md border-l-8 border-green-700 mt-2 
        uppercase font-bold">
          <i class="fa-solid fa-circle-check"></i>
          {{session("message")}}
        </p>
      </div>
    </div>
  @endif
  <div class="p-2 w-full">
    <table class="p-1 border-none w-full mb-10">
      <h1 class="mt-3 mb-3 uppercase font-inter text-pink-500 font-bold">Proveedores Registrados:</h1>
      <thead class="p-3 bg-pink-700 text-white font-bold">
        <th class="p-2">ID</th>
        <th class="p-2">Nombre</th>
        <th class="p-2">Empresa/Comañía</th>
        <th class="p-2">Teléfono</th>
        <th class="p-2">Correo Electrónico</th>
        <th class="p-2">Acciones</th>
      </thead>
      <tbody>
          @foreach ($providers as $provider)
            <tr class="text-center p-3 border-b-2 border-gray-200 mb-3">
              <td class="p-2 font-inter">{{$provider->id}}</td>
              <td class="p-2 font-inter">{{$provider->name}}</td>
              <td class="p-2 font-inter">{{$provider->company}}</td>
              <td class="p-2 font-inter">{{$provider->telephone}}</td>
              <td class="p-2 font-inter">{{$provider->email}}</td>
              <td class="p-2 font-inter">
                <div class="text-center">
                  <a 
                    href="{{route("providers.edit", $provider->id)}}" 
                    class="bg-blue-500 p-1 text-white rounded text-xl mr-1 hover:bg-blue-700" 
                    title="Editar"
                  >
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <button 
                    class="bg-red-500 text-white rounded py-1 px-2 ml-1 text-xl hover:bg-red-700" 
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