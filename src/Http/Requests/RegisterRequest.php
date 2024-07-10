<?php

namespace Rayium\Lame\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','min:6','max:255'],
            'email' => ['required','email','min:3','max:255','unique:users,email'],
            'password' => ['required','string', 'min:6', 'max:255']
        ];
    }
}
