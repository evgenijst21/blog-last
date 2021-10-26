<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class FeedbackRequest extends FormRequest
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
    public function rules() {
        
        return [
            'name' => [
                'required',
                'max:100',
            ],
            'email' => [
                'required',
                'max:100'
            ],
            'theme' => [
                'max:500',
            ],
            'text' => [
                'max:5000',
            ],
        ];
    }
    public function messages() {
        return [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'unique' => 'Такое значение поля «:attribute» уже используется',
            'min' => [
                'string' => 'Поле «:attribute» должно быть не меньше :min символов',
                'file' => 'Файл «:attribute» должен быть не меньше :min Кбайт'
            ],
            'max' => [
                'string' => 'Поле «:attribute» должно быть не больше :max символов',
                'file' => 'Файл «:attribute» должен быть не больше :max Кбайт'
            ],
        ];
    }
    public function attributes() {
        return [
            'name' => 'Имя',
            'email' => 'Электронная почта',
            'theme' => 'Тема',
            'text' => 'Сообщение',
        ];
    }
}
