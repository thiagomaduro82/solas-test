<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainRequest extends FormRequest
{
    public function rules()
    {
        return [
            'data_file' => 'required',
        ];
    }
}
