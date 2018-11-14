<?php

namespace IntelGUA\Sisaludent\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarUsuariosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Debe proveer un nombre para esta entrada',
            'email.required' => 'Debe agregar una descripcion para esta entrada',
        ];
    }
}
