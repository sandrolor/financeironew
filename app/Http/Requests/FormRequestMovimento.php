<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestMovimento extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $request = [];
        if ($this->method() == "POST" || $this->method() == "PUT"){
            $request = [
                'data_mov' => 'required',
                'descricao' => 'required',
                'conta_id' => 'required',
                'categoria_id' => 'required',
                'valor' => 'required',
            ];
        }
        return $request;
    }
}
