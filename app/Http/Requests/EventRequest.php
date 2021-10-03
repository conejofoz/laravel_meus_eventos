<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        
        //mudar o retorno para true senão não passa
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
            'title' => 'required|min:10',
            'description' => 'required',
            'body' => 'required',
            'start_event' => 'required',
            'banner' => 'image',
        ];
    }



    /**
     * Para traduzir as mensagens devemos sobrescrever o método messages
     */
    public function messages()
    {
        return [
            'required'  => 'Este campo é obrigatório',
            'min'       => 'Tamanho mínimo permitido :min',
            'image'     => 'O arquivo informado não é uma imagem válida!',
        ];
    }
}




