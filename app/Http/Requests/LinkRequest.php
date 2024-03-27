<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
            'tool' => ['required', 'integer'],
            'employee' => ['required', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'tool.required' => 'O campo Ferramenta é obrigatório.',
            'tool.integer' => 'O campo Ferramenta deve ser um valor inteiro.',
            'employee.required' => 'O campo Funcionário é obrigatório.',
            'employee.integer' => 'O campo Funcionário deve ser um valor inteiro.'
        ];
    }
}
