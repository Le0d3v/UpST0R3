@extends("layouts.admin")
@section("tittle")
  Gestión de Usuarios 
@endsection
@section("admin-content")
  <div class="w-full">
    <div class="flex justify-center">
      <h1 class="text-2xl font-inter font-bold">
        <i class="fa-solid fa-users"></i>
        Usuarios
      </h1>
    </div>
    <div class="flex justify-center">
      <a 
        href="{{route("users.create")}}"
        class="flex gap-1 items-center p-1 font-inter font-bold border-pink-600 border-solid border-2 rounded
        text-pink-600 mt-5 hover:cursor-pointer hover:bg-pink-600 hover:text-white transition"
      >
        <i class="fa-solid fa-user-plus text-lg"></i>
        Añadir Usuario
      </a>
    </div>
  </div>
  <div class="w-full max-w-6xl mx-auto my-8 bg-white p-3 rounded shadow-lg">
    <table class="w-full table-auto font-interr">
      <thead>
        <tr class="bg-gray-700 text-white font-inter font-bold">
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Nombre</th>
          <th class="px-4 py-2">Teléfono</th>
          <th class="px-4 py-2">Correo</th>
          <th class="px-4 py-2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr class="border-b border-gray-300 p-2">
          <td class="px-4 py-2 text-center">{{$user->id}}</td>
          <td class="px-4 py-2 text-center">{{$user->name}}</td>
          <td class="px-4 py-2 text-center">{{$user->telephone}}</td>
          <td class="px-4 py-2 text-center">{{$user->email}}</td>
          <td class="py-2">
            <div class="flex justify-center gap-4">
              <button
                class="text-red-600 p-1 border-solid border-2 border-red-600 rounded font-bold font-inter
                hover:text-white hover:bg-red-600 transition"
                onclick="deleteUser({{$user->id}})"
              >
                <i class="fa-solid fa-trash"></i>
                Eliminar
              </button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script>
    function deleteUser(id) {
    Swal.fire({
        title: "¿Estás seguro de Eliminar?",
        text: "Una vez eliminado, no podrá recuperarse",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            sendDelete(id);
        }
    });
    
}

async function sendDelete(id) {
    try {
        const url = `/delete/user/${id}`;
        const request = await fetch(url, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        });
        const result = await request.json();

        Swal.fire({
            icon: "success",
            title: "Eliminado Exitosamente",
            text: "El Usuario ha sido Eliminado Exitosamente",
        }).then(() => {
            window.location.reload();
        });
    } catch (error) {
        Swal.fire({
            icon: "error",
            tittle: "Error al Eliminar",
            text: "Ha ocurrido un error al eliminar el registro",
        });
    }
}

  </script>
@endsection