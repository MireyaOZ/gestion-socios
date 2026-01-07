 @csrf
 <div>
     <label for="">Número de contrato</label>
     <input type="text" name="contract_number" value="{{ old('contract_number', $client->contract_number) }}">

     <label for="">CURP</label>
     <input type="text" name="curp" value="{{ old('curp', $client->curp) }}">

     <label for="">Nombre completo</label>
     <input type="text" name="name" value="{{ old('name', $client->name) }}">

     <label for="">Calle</label>
     <input type="text" name="street" value="{{ old('street', $client->street) }}">

     <label for="">Colonia</label>
     <input type="text" name="colony" value="{{ old('colony', $client->colony) }}">

     <label for="">Número interior</label>
     <input type="text" name="interior_number" value="{{ old('interior_number', $client->interior_number) }}">

     <label for="">Número exterior</label>
     <input type="text" name="exterior_number" value="{{ old('exterior_number', $client->exterior_number) }}">

     <button class="btn btn-success my-3" type="submit">Enviar</button>

     <div class="back-link">
         <a href="{{ route('client.index') }}">← Volver</a>
     </div>
 </div>