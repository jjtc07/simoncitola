<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCargoRequest extends CreateCargoRequest
{
    /**
     * @override
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nombre" => "required|unique:cargos,nombre,".$this->cargo->id.","."id",
            'nivel'  => 'required|integer|min:0'
        ];
    }
}
