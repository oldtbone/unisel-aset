<?php

namespace App\Http\Requests;

use App\Models\Programme;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProgrammeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('programme_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:programmes',
            ],
            'name' => [
                'string',
                'required',
                'unique:programmes',
            ],
            'faculty_id' => [
                'required',
                'integer',
            ],
            'department_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
