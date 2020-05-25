<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
            'nome' => 'required|min:10',
            'email' => 'required|email:rfc,dns'
        ];
    }

    public function messages()
    {
        return [
            'min' => ':attribute deve ser de no mínimo :min caracteres',
            'required' => ':attribute é obrigatório',
            'email' => ':attribute inválido'
        ];
    }

    public function attributes() {
      return [
          'nome' => "Nome do Professor",
          'email' => "E-mail"
      ];
    }
}
