<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParentescoRequest extends CreateParentescoRequest
{
    /**
     * @override
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nombre" => "required|unique:parentescos,nombre,".$this->parentesco->id.","."id",
        ];
    }
}
