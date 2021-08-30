<?php

namespace App\Http\Requests;

use App\Models\Programme;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProgrammeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('programme_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:programmes,code,' . request()->route('programme')->id,
            ],
            'name' => [
                'string',
                'required',
                'unique:programmes,name,' . request()->route('programme')->id,
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
