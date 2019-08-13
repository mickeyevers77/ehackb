<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'             => ['required', 'string', 'max:255'],
            'published_at'      => ['nullable', 'date'],
            'short_description' => ['required', 'string'],
            'long_description'  => ['required', 'string'],
        ];
    }
}
