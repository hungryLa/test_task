<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email'=> 'required|email|string',
            'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле обязательно для заполения',
            'string' => 'Поле должно быть стройкой',
            'min' => 'Минимальное кол-во символов :min',
            'confirmed' => 'Пароли не совпадают',
            'email' => 'Введенное должно являтся электронной почтой',
        ];
    }
}
