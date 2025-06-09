<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMemberRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            // For a new member, the email must be unique in the entire 'users' table.
            'email' => 'required|string|email|max:255|unique:users',
            'status' => ['required', Rule::in(['Aktif', 'Non-aktif'])],
            // For a new member, the password is required and must be confirmed.
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
