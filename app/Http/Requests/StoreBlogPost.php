<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'min:5',
                'max:255',
                Rule::unique('posts', 'title')->ignore($this->post)
            ],
            'description' => 'required|min:255|max:2000',
            'content' => 'required|min:255',
            'image' => 'nullable|image|max:2048',
            'date' => 'nullable'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Название обязательно к заполнению!',
            'title.min' => 'Минимум 5 символов',
            'name.required' => 'Name is required!',
            'password.required' => 'Password is required!'
        ];
    }
}
