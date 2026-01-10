<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array      //Se definen los campos que se validan y como se validan
    { 
        $clientId = $this->route('client')?->id; //Obtiene el id de un cliente, ignora el mismo registro al editar

        return [
            'contract_number' => [
                'required', 
                Rule::unique('clients', 'contract_number')->ignore($clientId),
            ],

            'curp' => [
                'required',
                'size:18',
                Rule::unique('clients', 'curp')->ignore($clientId),
            ],

            'name' => 'required',
            'street' => 'required',
            'colony' => 'required',
            'interior_number' => 'required',
            'exterior_number' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'contract_number.required' => 'El campo Número de contrato es obligatorio.',
            'contract_number.unique' => 'El Número de contrato ya existe.',
        
            'curp.required' => 'El campo CURP es obligatorio.',
            'curp.size' => 'La CURP debe tener 18 caracteres.',
            'curp.unique' => 'Esta CURP ya está registrada.',
        
            'name.required' => 'El campo Nombre completo es obligatorio.',

            'street.required' => 'El campo Calle es obligatorio.',

            'colony.required' => 'El campo Colonia es obligatorio.',

            'interior_number.required' => 'El campo Número Interior es obligatorio.',

            'exterior_number.required' => 'El campo Número Exterior es obligatorio.',
        ];
    }
}
