<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorsFormRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'data_instrucao' => ['required', 'date'],
            'status' => ['required', 'string'],
            'motorista' => ['nullable', 'integer'],
            'carro' => ['nullable', 'integer'],
            'linha' => ['nullable'],
            'inicio_percurso' => ['nullable'],
            'final_percurso' => ['nullable'],
            'observacoes' => ['nullable', 'string']
        ];
    }
}
