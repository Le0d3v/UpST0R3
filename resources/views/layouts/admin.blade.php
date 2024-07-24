@extends("app")
@section("admin")
  <div class="flex flex-col h-screen">
    <div class="flex items-center justify-between p-3 text-white bg-pink-700">
      <div class="flex items-center gap-2">
        <i class="text-3xl fa-solid fa-hotel"></i>
        <h1 class="text-2xl font-bold font-inter">UpStore</h1>
      </div>
      <p 
        class="flex items-center gap-1 font-inter"
      >
        Bienvenido: 
        @auth
          <span class="font-bold text-yellow-400 font-inter">
            {{auth()->user()->name}}
          </span>
        @endauth
      </p>
      <a 
        href="{{route("logout")}}" 
        class="flex items-center p-2 space-x-1 text-sm font-bold text-gray-900 bg-yellow-300 rounded hover:bg-yellow-500 font-inter"
      >
        <i class="fas fa-sign-out-alt"></i>
        <span>Cerrar sesión</span>
      </a>
    </div>
    <div class="flex flex-1 overflow-hidden">
      <div class="flex flex-col justify-between p-3 bg-gray-600">
        <div class="space-y-4">
          <div class="p-1 rounded ">
            <h1 class="p-0 text-lg font-bold text-center text-white font-unter">Navegación</h1>
          </div>
          <div class="space-y-4">
            <a 
              href="{{route("admin")}}" 
              class="flex items-center space-x-2 p-1 pl-2 rounded text-md text-gray-400 hover:text-white hover:bg-gray-800 
                @if ($page == "home")
                  {{"bg-gray-800 text-white border-l-4 border-blue-500"}}
                @endif"
            >
              <i class="fa-solid fa-home"></i>
              <span>Inicio</span>
            </a>
            <a 
              href="{{route("storage")}}" 
              class="flex items-center space-x-2 text-md p-1 text-gray-400 hover:text-white pl-2 hover:bg-gray-800 rounded
                @if ($page == "storage")
                  {{"bg-gray-800 text-white border-l-4 border-blue-500"}}
                @endif"
            >
              <i class="fa-solid fa-box"></i>
              <span>Inventario</span>
            </a>
            <a 
              href="{{route("providers")}}" 
              class="flex items-center space-x-2 text-md p-1 text-gray-400 hover:text-white pl-2 hover:bg-gray-800 rounded
              @if ($page == "providers")
                {{"bg-gray-800 text-white border-l-4 border-blue-500"}}
              @endif"
          >
            <i class="fa-solid fa-truck-front"></i>
            <span>Proveedores</span>
          </a>  
            <a 
              href="{{route("reports")}}" 
              class="flex items-center space-x-2 text-md p-1 text-gray-400 hover:text-white pl-2 hover:bg-gray-800 rounded
                @if ($page == "reports")
                  {{"bg-gray-800 text-white border-l-4 border-blue-500"}}
                @endif"
            >
              <i class="fa-solid fa-clipboard-list"></i>
              <span>Bitácora</span>
            </a>
          </div>
        </div>
      </div>
      <div class="justify-center flex-1 w-full p-3 m-0 overflow-y-auto"> <!-- Contenido principal -->
        @yield('admin-content')
      </div>
    </div>
  </div>
  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @endpush
  @push("styles")
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
  @endpush
@endsection