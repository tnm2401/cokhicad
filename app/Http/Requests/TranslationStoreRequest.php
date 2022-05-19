<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class TranslationStoreRequest extends FormRequest
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
    public function rules(){
        $rules = Validator::make(request()->translation,[
            '*.name' => 'required',
            '*.slug' => 'required|unique:translations',
        ]);
        return $rules->validate();
        // return [
        //     'vi.name' => 'required',
        //     'en.name' => 'required',
        //     'vi.slug' => 'required|unique:translations',
        //     'en.slug' => 'required|unique:translations',
        // ];
    }

    public function messages()
    {
        // $rules = Validator::make(request()->translation,[
        //    'vi.name.required' => 'Vui lòng nhập tên :attribute !',
        //     'vi.slug.required' => 'Vui lòng nhập :attribute !',
        //     'vi.slug.unique' => ':attribute đã tồn tại !',
        // ]);
        // return $rules->validate();

        return [
            'vi.name.required' => 'Vui lòng nhập tên :attribute !',
            'vi.slug.required' => 'Vui lòng nhập :attribute !',
            'vi.slug.unique' => ':attribute đã tồn tại !',
            'en.name.required' => 'Vui lòng nhập tên :attribute !',
            'en.slug.required' => 'Vui lòng nhập :attribute !',
            'en.slug.unique' => ':attribute đã tồn tại !',
        ];
    }
    public function attributes()
    {
        return [
            'vi.name' => 'Tiếng Việt',
            'en.name' => 'Tiếng Anh',
            'vi.slug' => 'URL Tiếng Việt',
            'en.slug' => 'URL Tiếng Anh',
        ];
    }
}
