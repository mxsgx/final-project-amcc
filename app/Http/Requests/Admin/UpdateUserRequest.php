<?php

namespace App\Http\Requests\Admin;

use App\Enums\UserPermission;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique(User::getModel()->getTable())->ignore($this->route('user'))],
            'verified' => ['boolean'],
            'role' => ['nullable', 'required_if:permissions,null', Rule::in(UserRole::getValues())],
            'permissions' => ['nullable', 'required_if:role,null'],
            'permissions.*' => [Rule::in(UserPermission::getValues())],
        ];
    }
}
