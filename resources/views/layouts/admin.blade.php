@extends("app")
@section("admin")
  <div class="flex flex-col h-screen">
    <div class="bg-pink-700 text-white p-3 flex items-center justify-between">
      <div class="flex gap-2 items-center">
        <i class="fa-solid fa-hotel text-3xl"></i>
        <h1 class="font-bold font-inter text-2xl">UpStore</h1>
      </div>
      <p 
        class="font-inter flex items-center gap-1"
      >
        Bienvenido: 
        @auth
          <span class="text-yellow-400 font-bold font-inter">
            {{auth()->user()->name}}
          </span>
        @endauth
      </p>
      <a 
        href="{{route("logout")}}" 
        class="flex items-center space-x-1 text-gray-900 p-2 rounded bg-yellow-300 hover:bg-yellow-500 
          font-bold font-inter text-sm"
      >
        <i class="fas fa-sign-out-alt"></i>
        <span>Cerrar sesión</span>
      </a>
    </div>
    <div class="flex flex-1 overflow-hidden">
      <div class="bg-gray-600 p-3 flex flex-col justify-between">
        <div class="space-y-4">
          <div class=" p-1 rounded">
            <h1 class="font-unter text-white font-bold text-lg text-center p-0">Navegación</h1>
          </div>
          <div class="space-y-4">
            <a 
              href="{{route("admin")}}" 
              class="flex items-center space-x-2 p-1 pl-2 rounded text-lg text-gray-400 hover:text-white hover:bg-gray-800 
                @if ($page == "home")
                  {{"bg-gray-800 text-white border-l-4 border-blue-500"}}
                @endif"
            >
              <i class="fa-solid fa-home"></i>
              <span>Inicio</span>
            </a>
            <a 
              href="{{route("storage")}}" 
              class="flex items-center space-x-2 text-lg p-1 text-gray-400 hover:text-white pl-2 hover:bg-gray-800 rounded
                @if ($page == "storage")
                  {{"bg-gray-800 text-white border-l-4 border-blue-500"}}
                @endif"
            >
              <i class="fa-solid fa-box"></i>
              <span>Inventario</span>
            </a>
            <a 
              href="{{route("providers")}}" 
              class="flex items-center space-x-2 text-lg p-1 text-gray-400 hover:text-white pl-2 hover:bg-gray-800 rounded
              @if ($page == "providers")
                {{"bg-gray-800 text-white border-l-4 border-blue-500"}}
              @endif"
          >
            <i class="fa-solid fa-truck-front"></i>
            <span>Proveedores</span>
          </a>  
            <a 
              href="{{route("reports")}}" 
              class="flex items-center space-x-2 text-lg p-1 text-gray-400 hover:text-white pl-2 hover:bg-gray-800 rounded
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
      <div class="flex-1 justify-center p-3 w-full m-0 overflow-y-auto"> <!-- Contenido principal -->
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