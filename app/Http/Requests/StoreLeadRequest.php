<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:leads,email',
            'interest' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.string' => 'O nome da categoria deve ser um texto.',
            'name.max' => 'O nome da categoria não pode exceder 255 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.unique' => 'E-mail já cadastrado',
            'email.email' => 'Utilize um e-mail válido',
            'email.max' => 'O e-mail não pode exceder 255 caracteres.',
            'interest.required' => 'Selecione pelo menos 1 interesse.',           
        ];
    }
}
