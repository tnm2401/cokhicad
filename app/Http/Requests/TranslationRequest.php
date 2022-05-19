<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class TranslationRequest extends FormRequest
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
        // $rules = Validator::make(request()->translation,[
        //     'slug.*' => 'required|unique:translations',
        //     'name.*' => 'required',
        // ]);
        // return $rules->validate();
        // if (session('locale') == 'vi') {
        //     return [
        //     'slug.vi' => 'required|unique:translations',
        //     'name.vi' => 'required',
        //     ];
        // } else {
        //     return [
        //     'slug.en' => 'required|unique:translations',
        //     'name.en' => 'required',
        //     ];
        // }
        $rules = Validator::make(request()->translation,[
            'slug' => 'required|unique:translations',
            'name' => 'required',
        ]);
        return $rules->validate();

            // return [
            // 'slug' => 'required|unique:translations',
            // 'name' => 'required',
            // ];
       
    }

    public function messages()
    {
        $messages = Validator::make(request()->translation,[
            'name.required' => 'Vui lòng nhập tên :attribute !',
            'slug.required' => 'Vui lòng nhập :attribute !',
            'slug.unique' => ':attribute đã tồn tại !',
            'en.name.required' => 'Vui lòng nhập tên :attribute !',
            'en.slug.required' => 'Vui lòng nhập :attribute !',
            'en.slug.unique' => ':attribute đã tồn tại !',
        ]);
        return $messages->validate();
        // if (session('locale') == 'vi') {
        //     return [
        //     'name.required' => 'Vui lòng nhập tên :attribute !',
        //     'slug.required' => 'Vui lòng nhập :attribute !',
        //     'slug.unique' => ':attribute đã tồn tại !',
        //     'en.name.required' => 'Vui lòng nhập tên :attribute !',
        //     'en.slug.required' => 'Vui lòng nhập :attribute !',
        //     'en.slug.unique' => ':attribute đã tồn tại !',
        // ];
        // }
        
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
