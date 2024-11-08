<?php

namespace Src\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Src\Configs\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class AuthFormRequest extends FormRequest
{
    use ApiResponse;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser valido',
            'password.required' => 'La contrasenia es requerida'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException(
            $validator,
            $this->response(
                code: 400,
                message: 'Errores de validacion',
                errors: $validator->errors()
            )
        );
    }
}
