<?php

namespace IntelGUA\Sisaludent\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearUsuariosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required'|'string'|'alpha_spaces',
            'email' => 'required'|'email',
            'password' => 'required',
            'rol_id' => 'required',
            'permission_id' => 'required',
            'status' => 'nullable',
        ];
    }
     public function messages()
    {
        return [
            'name.required' => 'Debe proveer un nombre para esta entrada',
            'name.string' => 'Debe proveer un nombre para esta entrada',
            'name.alpha_spaces' => 'Debe proveer un nombre para esta entrada',
            'email.required' => 'Debe agregar una descripcion para esta entrada',
            'password.required' => 'Debe agregar una descripcion para esta entrada',
            'email.required' => 'Debe agregar una descripcion para esta entrada',
            'rol_id.required' => 'Debe agregar una descripcion para esta entrada',
            'permission_id.required' => 'Debe agregar una descripcion para esta entrada',
        ];
        $this->validate($request, $rules, $messages);
    }
}
