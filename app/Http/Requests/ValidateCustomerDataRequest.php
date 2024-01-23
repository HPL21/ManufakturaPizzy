<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCustomerDataRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|regex:/^(\p{Lu}\p{Ll}+)(\s\p{Lu}\p{Ll}+)*$/u|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits:9',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'Imię i nazwisko musi składać się z co najmniej dwóch wyrazów, każdy z nich musi zaczynać się wielką literą',
            'name.required' => 'Imię i nazwisko jest wymagane',
            'name.max' => 'Imię i nazwisko może zawierać maksymalnie 255 znaków',
            'address.required' => 'Adres jest wymagany',
            'address.max' => 'Adres może zawierać maksymalnie 255 znaków',
            'email.required' => 'Adres e-mail jest wymagany',
            'email.email' => 'Adres e-mail musi być poprawny',
            'email.max' => 'Adres e-mail może zawierać maksymalnie 255 znaków',
            'phone.required' => 'Numer telefonu jest wymagany',
            'phone.numeric' => 'Numer telefonu musi być liczbą',
            'phone.digits' => 'Numer telefonu musi składać się z 9 cyfr',
        ];
    }
}
