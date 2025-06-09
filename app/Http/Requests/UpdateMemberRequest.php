<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMemberRequest extends FormRequest
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
        // Get the user ID from the route parameter
        $memberId = $this->route('member')->id;

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                // Ensure the email is unique, but ignore the current member's email
                Rule::unique('users')->ignore($memberId),
            ],
            'status' => ['required', Rule::in(['Aktif', 'Non-aktif'])],
            // Make the password optional. If provided, it must be at least 6 characters.
            'password' => 'nullable|string|min:6|confirmed',
        ];
    }
}
