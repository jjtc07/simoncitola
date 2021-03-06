<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeriodoRequest extends FormRequest
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
            'inicio' => 'required|date_format:d-m-Y|before:fin',
            'fin'    => 'required|date_format:d-m-Y|after:inicio',
            "nombre" => "required|unique:periodos,nombre,".$this->periodo->id.","."id"
        ];
    }
}