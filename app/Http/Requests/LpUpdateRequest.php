<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LpUpdateRequest extends FormRequest
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
            'description' => 'required|string|min:5|string|max:500',
            'artist_id' => 'required|string',
            'songsAuthors' => 'required|array',
            'songsAuthors.0.song' => 'required|string|min:5',
            'songsAuthors.0.authors.0' => 'required_without:songsAuthors.0.authorsManual|max:255',
            'songsAuthors.0.authorsManual' => 'required_without:songsAuthors.0.authors.0|max:255',
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
            'songsAuthors.0.song' => 'You must write at least 1 song and 5 characters minimum.',
            'songsAuthors.0.authors.0' => 'You must select an author if you don\'t write it manually.',
            'songsAuthors.0.authorsManual.0' => 'You must manually write author if you don\'t select one.',
        ];
    }
}
