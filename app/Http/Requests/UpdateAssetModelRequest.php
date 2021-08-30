<?php

namespace App\Http\Requests;

use App\Models\AssetModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetModelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_model_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:asset_models,name,' . request()->route('asset_model')->id,
            ],
            'asset_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
