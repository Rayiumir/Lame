<?php

namespace Rayium\Lame\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','min:6','max:255'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','string', 'min:8']
        ];
    }
}
