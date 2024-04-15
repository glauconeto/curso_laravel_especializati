<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
{
    /**
     * Determina se o usuário é autorizado a fazer esta requisição.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtem as regras de validação que se aplicam à solicitação.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->id ?? '';

        $rules = [
            'name' => 'required|string|min:3|max:255',
            'email' => [
                'required',
                'email',
                "unique:users,email,{$id},id"
            ],
            'password' => [
                'required',
                'min:8',
                'max:256'
            ]
        ];

        if ($this->method('PUT')) {
            $rules['password'] = [
                'nullable',
                'min:8',
                'max:256'
            ];
        }

        return $rules;
    }
}
