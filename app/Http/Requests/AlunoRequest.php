<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlunoRequest extends FormRequest
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
            'nome' => 'required|max:100',
            'nasc' => 'required|date',
            'serie' => ['required', Rule::in(['1', '2', '3', '4', '5', '6', '7', '8', '9'])],
            'cep' => 'required|max:8',
            'rua' => 'required|max:120',
            'numero_endereco' => 'required|numeric',
            'complemento' => 'max:50',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:100',
            'estado' => ['required', Rule::in(['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'])],
            'nome_mae' => 'required|max:100',
            'cpf' => 'required|max:11|cpf',
            'venc' => ['required', Rule::in(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'])]
        ];
    }
}
