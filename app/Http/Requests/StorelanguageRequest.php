<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StorelanguageRequest extends FormRequest
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
            'id'=>'nullable',
            'abbr'=> 'required|max:10',
            'local'=>'required|max:20',
            'name'=>'required|max:100',
            'native'=>'required|max:100',
            'direction'=>'required|in:rtl,ltr',
            'active'=>'required|in:0,1',
            'flag' => 'nullable'

        ];

    }
    public function messages(): array
    {
        return [
            'abbr.required' => 'The locale field is required.',
            'local.required' => 'The locale field is required.',
            'name.required' => 'The name field is required.',
            'native.required' => 'The native name is required.',
            'flag.url' => 'The flag must be a valid URL.',
            'direction.in' => 'The direction must be either ltr or rtl.',
            'active.boolean' => 'The active field must be true or false.',
        ];
    }
}
