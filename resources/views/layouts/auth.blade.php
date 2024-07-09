@extends("app")
@section("tittle")
  Iniciar Sesión
@endsection
@section("auth")
  <div class="bg-image flex justify-center items-center">
    <div class="w-30 h-30 p-8 rounded-lg bg-gray-200 bg-opacity-70 shadow-lg">
      <div class="w-full">
        <h1 class="text-pink-500 font-bold p-1 text-8xl font-inter text-center">UpStore</h1>
        <h2 class="text-pink-500 font-inter my-5 text-3xl text-center">Iniciar Sesión</h2>
      </div>
      <div class="">
        @if (session("error"))
          <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-2">
            <i class="fa-solid fa-circle-xmark"></i>
            {{session("error")}}
          </p>
        @endif
        @error("email")
          <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-2">    
            <i class="fa-solid fa-circle-xmark"></i>
            {{$message}}
          </p>
        @enderror
        @error("password")
          <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-2">       
          <i class="fa-solid fa-circle-xmark"></i>
          {{$message}}
        </p>
        @enderror
      </div>
      <form action="{{route("login.store")}}" method="POST" class="container">
        @csrf
        <div>
          <div class="mb-3">
            <label 
              for="email" 
              class="text-gray-800 w-100 mb-3 text-2xl @error("email")
                  text-red-500
                @enderror"
              >
              Correo Electrónico
            </label>
            <input 
              type="text"
              name="email" 
              id="email" 
              placeholder="Correo Electrónico con Acceso (Ej. correo@gmail.com)" 
              class="p-2 w-full rounded mt-1 border-2 border-gray-300 @error("email")
                  border-red-300
                @enderror" 
              value="{{old("email")}}"
            >
          </div>
          <div class="mb-3">
            <label 
              for="password" 
              class="text-gray-900 w-100 mb-3 text-2xl @error("password")
                text-red-500
              @enderror"
              >
              Contraseña
            </label>
            <input 
              type="password" 
              name="password" 
              id="password" 
              placeholder="Contraseña de Acceso" 
              class="p-2 w-full rounded mt-1 border-2 border-gray-300 @error("password")
                  border-red-300
                @enderror" 
              value="{{old("password")}}"
            >
          </div>
        </div>
        <div class="flex justify-end">
          <input type="submit" class="p-2 font-inter font-bold uppercase rounded text-white bg-pink-600 hover:bg-pink-800 cursor-pointer" value="Iniciar Sesión">
        </div>
      </form>
    </div>
  </div>
@endsection