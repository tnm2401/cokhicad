<?php

namespace App\Http\Requests;
use Validator;
use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
            'name.*' => 'required',
            'slug.*' => 'required|unique:translations',
        ];
    }
    public function messages()
    {
        return [
            'name.vi.required' => 'Vui lòng nhập Tên Tiếng Việt !',
            'slug.vi.required' => 'Vui lòng nhập URL Tiếng Việt !',
            'slug.vi.unique' => 'URL Tiếng Việt đã tồn tại !',
            'name.en.required' => 'Vui lòng nhập Tên Tiếng Anh !',
            'slug.en.required' => 'Vui lòng nhập URL Tiếng Anh !',
            'slug.en.unique' => 'URL Tiếng Anh đã tồn tại !',
        ];

    }
}
