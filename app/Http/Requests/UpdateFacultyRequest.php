<?php

namespace App\Http\Requests;

use App\Models\Faculty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFacultyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('faculty_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:faculties,code,' . request()->route('faculty')->id,
            ],
            'name' => [
                'string',
                'required',
                'unique:faculties,name,' . request()->route('faculty')->id,
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
