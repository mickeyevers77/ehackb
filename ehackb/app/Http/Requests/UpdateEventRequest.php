<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'             => ['required', 'string', 'max:255'],
            'speaker'           => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'long_description'  => ['required', 'string'],
            'slots'             => ['required', 'numeric'],
        ];
    }
}
