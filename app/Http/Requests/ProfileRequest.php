<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $rules =  [
            'user.name' => 'required',
            'user.email' => 'required|email'
        ];

        /***
         * Verificar se foi digitado a senha
         * adicionar uma nova regra de validação para o input password
         * confirmed - verifica se a senha e a confirmação de senha são iguais
         * o input de confirmação deve se chamar password_confirmation
         * o validador confirmation funciona assim: o nome que a gente colocar + _confirmation por isso ficou password_confirmation
         * comparando assim: password com password_confirmation
         */
        //if($this->request->get('password'))
        if($this->request->get('user')['password'])
        {
            $rules['user.password'] = 'string|min:8|confirmed';
        }

        return $rules;
    }


    public function messages()
    {
        return [
            'required' => 'Estes campos são obrigatórios!',
            'confirmed' => 'Confirmação de senha inválida!',
            'min' => 'A senha deve ter pelo menos :min caracteres',
        ];
    }
}
