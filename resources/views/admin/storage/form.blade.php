<fieldset>
  <legend class="text-black font-inter text-center text-2xl">
    Datos del Producto
  </legend>
  <div class="mt-3 w-full">
    <label for="name" class="text-gray-500 font-bold">
      Nombre del Producto
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
      value="{{$product->name ?? old("name")}}"
      placeholder="Nombre del Producto"
      class="p-2 w-full border-solid border-2 border-gray-300 rounded mt-1 @error("name")
        border-red-400
      @enderror"
    >
  </div>
  <div class="mt-3 w-full">
    <label for="unities" class="text-gray-500 font-bold">
      Unidades
    </label>
    @error("unities")
      <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-1">
        <i class="fa-solid fa-circle-xmark"></i>
        {{$message}}
      </p>
    @enderror
    <input 
      type="text" 
      name="unities" 
      id="unities"
      value="{{$product->unities ?? old("unities")}}"
      placeholder="Cantidad de Productos (1 - n)"
      class="p-2 w-full border-solid border-2 border-gray-300 rounded mt-1 @error("name")
        border-red-400
      @enderror"
    >
  </div>
  <div class="mt-3 w-full border-b-4 p-1">
    <label for="category" class="text-gray-500 font-bold">
      Categoría del producto
    </label>
    @error("category_id")
      <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-1">
        <i class="fa-solid fa-circle-xmark"></i>
        {{$message}}
      </p>
    @enderror
    <p>Seleccione la categoría que más se acerque a las cualidades de su producto:</p>
    <select 
      name="category_id" 
      id="" 
      class="p-2 bg-pink-700 text-white rounded mt-1 mb-5"
    >
      <option value="0" disabled selected> -- Sleccione -- </option>
      @foreach ($categories as $category)
        <option value="{{$category->id}}" class="font-bold font-inter">{{$category->category}}</option>
      @endforeach
    </select>
  </div>
  <div class="mt-3 w-full p-2">
    <label for="provider" class="text-gray-500 font-bold">
      Proveedor Del Producto
    </label>
    @error("provider_id")
    <p class="p-2 bg-red-500 text-white font-bold uppercase font-inter rounded border-l-8 border-red-700 mb-1">
      <i class="fa-solid fa-circle-xmark"></i>
      {{$message}}
    </p>
    @enderror
    <p>Seleccione un proveedor de los registrados en plataforma</p>
    <select name="provider_id" class="p-2 bg-pink-700 text-white rounded mt-1">
      <option value="0" disabled selected> -- Sleccione -- </option>
      @foreach ($providers as $provider)
        <option value="{{$provider->id}}" class="font-bold font-inter">{{$provider->name}} - ({{$provider->company}})</option>
      @endforeach
    </select>
  </div>
  <div>
    <input type="hidden" name="image" id="imageProduct" value="{{old("image") ?? ""}}">
  </div>
</fieldset>