<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => ['required', 'string', 'min:3', 'max:100'],
            'descricao' => ['nullable', 'string', 'max:1000'],
            'dataTermino' => ['nullable', 'date'],
            'prioridade' => ['required', 'in:Alta,Média,Baixa'],
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O título da tarefa é obrigatório.',
            'titulo.min' => 'O título deve ter pelo menos :min caracteres.',
            'titulo.max' => 'O título não pode ultrapassar :max caracteres.',
            'descricao.max' => 'A descrição não pode ultrapassar :max caracteres.',
            'dataTermino.date' => 'Informe uma data válida para o prazo.',
            'prioridade.required' => 'Selecione uma prioridade para a tarefa.',
            'prioridade.in' => 'A prioridade selecionada é inválida.',
        ];
    }
}
