<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'cod_documento' => 'required',
            'titulo' => 'required|max:180',
            'tipo' => 'required',
            'asunto' => 'required|max:255',
            'origen' => 'required',
            'destino' => 'required',
            'archivo' => 'required|file|max:5000|mimes:pdf,docx,doc,xls,xlt,xlsx',
        ];
    }
}
