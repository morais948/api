<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => 'required',
            'preco' => 'required',
            'quantidade' => 'required',
            'categoria' => 'required',
            'imagem' => 'required|image|mimes:jpg,png,jpeg|max:2000'
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'Nome é obrigatório',
            'preco.required' => 'Preco é obrigatório',
            'quantidade.required' => 'Quantidade é obrigatório',
            'categoria.required' => 'Categoria é obrigatório',
            
            'imagem.required' => 'Imagem é obrigatório',
            'imagem.max' => 'Tamanho máximo do arquivo dever ser de 2MB',
            'imagem.image' => 'O arquivo deve ser uma imagem',
            'imagem.mimes' => 'A imagem deve ser do tipo PNG, JPG ou JPEG'
        ];
    }
}
