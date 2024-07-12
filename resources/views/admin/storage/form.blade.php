<fieldset>
  <legend class="text-2xl text-center text-black font-inter">
    Datos del Producto
  </legend>
  <div class="w-full mt-3">
    <label for="name" class="font-bold text-gray-500">
      Nombre del Producto
    </label>
    @error("name")
      <p class="p-2 mb-1 font-bold text-white uppercase bg-red-500 border-l-8 border-red-700 rounded font-inter">
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
  <div class="w-full mt-3">
    <label for="unities" class="font-bold text-gray-500">
      Unidades
    </label>
    @error("unities")
      <p class="p-2 mb-1 font-bold text-white uppercase bg-red-500 border-l-8 border-red-700 rounded font-inter">
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
  <div class="w-full p-1 mt-3 border-b-4">
    <label for="category" class="font-bold text-gray-500">
      Categoría del producto
    </label>
    @error("category_id")
      <p class="p-2 mb-1 font-bold text-white uppercase bg-red-500 border-l-8 border-red-700 rounded font-inter">
        <i class="fa-solid fa-circle-xmark"></i>
        {{$message}}
      </p>
    @enderror
    <p>Seleccione la categoría que más se acerque a las cualidades de su producto:</p>
    <select 
      name="category_id" 
      id="" 
      class="p-2 mt-1 mb-5 text-white bg-pink-700 rounded"
    >
      <option value="0" disabled selected> -- Sleccione -- </option>
      @foreach ($categories as $category)
        <option 
          value="{{$category->id}}" 
          class="font-bold font-inter"
          {{isset($product) && $product->category_id == $category->id ? "selected"  : ""}}
        >
          {{$category->category}}
        </option>
      @endforeach
    </select>
  </div>
  <div class="w-full p-2 mt-3">
    <label for="provider" class="font-bold text-gray-500">
      Proveedor Del Producto
    </label>
    @error("provider_id")
    <p class="p-2 mb-1 font-bold text-white uppercase bg-red-500 border-l-8 border-red-700 rounded font-inter">
      <i class="fa-solid fa-circle-xmark"></i>
      {{$message}}
    </p>
    @enderror
    <p>Seleccione un proveedor de los registrados en plataforma</p>
    <select name="provider_id" class="p-2 mt-1 text-white bg-pink-700 rounded">
      <option value="0" disabled selected> -- Sleccione -- </option>
      @foreach ($providers as $provider)
        <option 
          value="{{$provider->id}}" 
          class="font-bold font-inter"
          {{isset($product) && $product->provider_id == $provider->id ? "selected"  : ""}}
        >
          {{$provider->name}} - ({{$provider->company}})
        </option>
      @endforeach
    </select>
  </div>
  <div>
    <input type="hidden" name="image" id="imageProduct" value="{{$product->image ?? old("image")}}">
  </div>
  <div class="w-full mt-3">
    <label for="total_price" class="font-bold text-gray-500">
      Total
    </label>
    <p>Ingrese la cantidad total a pagar (Tomando en cuenta todas las unidades)</p>
    @error("total_price")
      <p class="p-2 mb-1 font-bold text-white uppercase bg-red-500 border-l-8 border-red-700 rounded font-inter">
        <i class="fa-solid fa-circle-xmark"></i>
        {{$message}}
      </p>
    @enderror
    <input 
      type="number" 
      min="1"
      name="total_price" 
      id="total_price"
      value="{{$product->total_price ?? old("total_price")}}"
      placeholder="Cantidad de Productos (1 - n)"
      class="p-2 w-full border-solid border-2 border-gray-300 rounded mt-1 @error("name")
        border-red-400
      @enderror"
    >
  </div>
</fieldset>