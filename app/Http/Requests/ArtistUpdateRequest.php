<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistUpdateRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:5|max:500',
        ];
    }

    /**
     * Customize message of error in validation
     * 
     * @return string[]
     */
    public function messages()
    {
        return [
            'name' => 'You must write a name and 5 characters minimum.',
            'description' => 'You must write a description and 5 characters minimum.'
        ];
    }
}
