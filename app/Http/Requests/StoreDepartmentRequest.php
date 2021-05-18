<?php

namespace App\Http\Requests;

use App\Models\Department;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('department_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:departments',
            ],
            'name' => [
                'string',
                'required',
                'unique:departments',
            ],
            'faculty_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
