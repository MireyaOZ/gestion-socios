 @csrf
 <div class="form-container">
     <label for="">Número de contrato</label>
     <input type="text" name="contract_number" value="{{ old('contract_number', $client->contract_number) }}">

     <label for="">CURP</label>
     <input type="text" name="curp" value="{{ old('curp', $client->curp) }}">

     <label for="">Nombre</label>
     <input type="text" name="name" value="{{ old('name', $client->name) }}">

     <label for="">Dirección</label>
     <textarea class="" name="direction">{{ old('direction', $client->direction) }}</textarea>

     <button class="btn btn-success my-3" type="submit">Enviar</button>

     <div class="back-link">
         <a href="{{ route('client.index') }}">← Volver</a>
     </div>
 </div>
