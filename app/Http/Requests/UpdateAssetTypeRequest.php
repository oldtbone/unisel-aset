<?php

namespace App\Http\Requests;

use App\Models\AssetType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:asset_types,name,' . request()->route('asset_type')->id,
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
