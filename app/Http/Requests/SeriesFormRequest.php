<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        //autoriza qualquer um fazer o request
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
            'nome'=> 'required|min:3|max:40',
        ];
    }

    public function messages(){
        return [
            'required'=> 'O campo :attribute deve ser preenchido',
                 'nome.min'=> 'O campo nome deve ter no minimo 3 caracteres',
                 'nome.max'=> 'O campo nome deve ter no maximo 40 caracteres',
                 //verifica na tabela undades se existe um id relacionado
                 'unidade_id'=> 'exists:series,id',
        ];

    }
}
