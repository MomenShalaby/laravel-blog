<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{



    protected function createRules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'user_id' => 'required|exists:user,id',
        ];
    }

    protected function updateRules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'min:3', 'max:255'],
            'description' => ['sometimes', 'string'],
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'user_id' => 'sometimes|exists:users,id',

        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            return $this->updateRules();
        }
        return $this->createRules();
    }
}
