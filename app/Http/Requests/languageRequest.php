<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class languageRequest extends FormRequest
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
            'abbr'=> 'required|max:10',
            'local'=>'required|max:20',
            'name'=>'required|max:100',
            'native'=>'required|max:100',
            'flag'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'direction'=>'required|in:rtl,ltr',
            'active'=>'required|in:0,1'
        ];
    }
}
