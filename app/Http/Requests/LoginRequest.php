<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    public function messages():array
    {
        return[
            'name.required'=>'Tên không được bỏ trống',
            'name.max'=>'Tiêu đề tối đa 255 ký tự',
            'email.required'=>'Email không đươc bỏ trống',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Password không được để trống',
        ];
    }
}
