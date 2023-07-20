<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"=>'required|min:2',
            "body"=>'required|min:5|max:100', 
            "price"=>'required', 
        ];
    }

    public function messages(){
        return[
            'name.required'=>'il nome del prodotto è richiesto',
            'name.min'=>'il nome del prodotto è troppo corto',
            'body.required'=>'la descrizione del prodotto è richiesta',
            'body.min'=>'la descrizione del prodotto è troppo corta',
            'body.max'=>'la descrizione del prodotto è troppo lunga',
            'price.required'=>'il prezzo del prodotto è richiesto', 
        ]; 
    }
}
