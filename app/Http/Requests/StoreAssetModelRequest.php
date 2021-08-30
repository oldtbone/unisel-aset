<?php

namespace App\Http\Requests;

use App\Models\AssetModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssetModelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_model_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:asset_models',
            ],
            'asset_type_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
