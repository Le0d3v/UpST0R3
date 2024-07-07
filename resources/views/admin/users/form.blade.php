<fieldset>
  <legend class="text-3xl font-bold text-center">
    Datos del Usuario
  </legend>
  <div class="flex gap-5">
    <div class="my-3 w-full">
      <label for="name">
        Nombre
      </label>
      <input 
        type="text" 
        name="name" 
        id="name"
        placeholder="Nombre y Primer Apellido"
        class="p-1 w-full border-solid border-2 border-gray-300 rounded mt-1"
      >
    </div>
  </div>
  <div class="mt-1 w-full">
    <label for="email">Teléfono</label>
    <input 
      type="email" 
      name="email" 
      id="email"
      placeholder="10 Digitos Ej. 1234567890"
      class="p-1 w-full border-solid border-2 border-gray-300 rounded mt-1"
    >
  </div>
  <div class="my-3 w-full">
    <label for="telephone">Correo Electrónico</label>
    <input 
      type="email" 
      name="telephone" 
      id="telephone"
      placeholder="Correo Elecrónico Válido"
      class="p-1 w-full border-solid border-2 border-gray-300 rounded mt-1"
    >
  </div>
</fieldset>