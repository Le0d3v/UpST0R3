<fieldset>
  <legend class="text-black font-inter text-center text-2xl">
    Datos del Proveedor
  </legend>
  <div class="mt-3 w-full">
    <label 
    for="name" 
    class="text-gray-500 font-bold"
    >
      Nombre del Proveedor
    </label>
    @error("name")
      <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-1">
        <i class="fa-solid fa-circle-xmark"></i>
        {{$message}}
      </p>
    @enderror
    <input 
      type="text" 
      name="name" 
      id="name"
      value="{{$provider->name ?? old("name")}}"
      placeholder="Nombre completo del Proveedor"
      class="p-2 w-full border-solid border-2 border-gray-300 rounded mt-1 @error("name")
        border-red-400
      @enderror"
    >
  </div>
  <div class="mt-3 w-full">
    <label for="comapny" class="font-bold text-gray-500">
      Empresa/Compañía
    </label>
    @error("company")
      <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-1">
        <i class="fa-solid fa-circle-xmark"></i>
        {{$message}}
      </p>
    @enderror
    <input 
      type="text" 
      name="company" 
      id="company"
      value="{{$provider->company ?? old("company")}}"
      placeholder="Nombre de la Empresa o Compañia del Proveedor"
      class="p-2 w-full border-solid border-2 border-gray-300 rounded mt-1 @error("company")
        border-red-400
      @enderror"
    >
  </div>
  <div class="mt-3 w-full">
    <label for="telephone" class="font-bold text-gray-500">
      Teléfono
    </label>
    @error("telephone")
      <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-1">
        <i class="fa-solid fa-circle-xmark"></i>
        {{$message}}
      </p>
    @enderror
    <input 
      type="tel" 
      name="telephone" 
      id="telephone"
      value="{{$provider->telephone ?? old("telephone")}}"
      placeholder="Número telefónico de 10 digitos"
      class="p-2 w-full border-solid border-2 border-gray-300 rounded mt-1 @error("telephone")
        border-red-400
      @enderror"
    >
  </div>
  <div class="mt-3 w-full">
    <label for="email" class="font-bold text-gray-500">
      Correo Electrónico del Proveedor
    </label>
    @error("email")
    <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-1">
      <i class="fa-solid fa-circle-xmark"></i>
      {{$message}}
    </p>
  @enderror
    <input 
      type="email" 
      name="email" 
      id="email"
      value="{{$provider->email ?? old("email")}}"
      placeholder="Ej. (correo@gmail.com)"
      class="p-2 w-full border-solid border-2  rounded mt-1 @error("email")
          border-red-400 
        @enderror
      "
    >
  </div>
</fieldset>