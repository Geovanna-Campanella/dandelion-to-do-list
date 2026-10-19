<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
{
    // //**
    //  * Determine if the user is authorized to make this request. **//
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuario,email'],
            'senha' => ['required', 'string', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto válido.',
            'nome.min' => 'O nome deve ter pelo menos :min caracteres.',
            'nome.max' => 'O nome não pode ultrapassar :max caracteres.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ultrapassar :max caracteres.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'senha.required' => 'A senha é obrigatória.',
            'senha.string' => 'A senha deve ser um texto válido.',
            'senha.min' => 'A senha deve ter pelo menos :min caracteres.',
        ];
    }
}
