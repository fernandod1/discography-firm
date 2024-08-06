<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistSearchRequest extends FormRequest
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
            'artist' => 'required|string|min:3|max:255',
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
            'artist' => 'You must write a name and 3 characters minimum.'
        ];
    }
}