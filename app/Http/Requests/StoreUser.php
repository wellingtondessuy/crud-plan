<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [ 'required', 'string', 'max:255' ],
            'email' => [ 'email:rfc,dns' , 'unique:users' ],
            'password' => [ 'required', 'string', 'min:8', 'max:30' ],
            'phone' => [ 'required', 'string', 'max:20' ],
        ];
    }

    public function messages() {

        return [
            'name.required' => 'Nome deve ser preenchido.',
            'name.max' => 'Nome maior que o permitido (máx. 255).',
            'email.email' => 'Informe um endereço de email válido.',
            'email.unique' => 'Email já cadastrado para outro usuário.',
            'password.required' => 'Senha inválida.',
            'password.string' => 'Senha inválida.',
            'password.min' => 'Senha menor que o permitido (mín. 8).',
            'password.max' => 'Senha maior que o permitido (máx. 30).',
            'phone.required' => 'Telefone deve ser preenchido.',
            'phone.string' => 'Telefone inválido.',
            'phone.max' => 'Telefone maior que o permitido.',
        ];

    }
}
