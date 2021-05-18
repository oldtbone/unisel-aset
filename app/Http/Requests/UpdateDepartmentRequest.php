<?php

namespace App\Http\Requests;

use App\Models\Department;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDepartmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('department_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:departments,code,' . request()->route('department')->id,
            ],
            'name' => [
                'string',
                'required',
                'unique:departments,name,' . request()->route('department')->id,
            ],
            'faculty_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
