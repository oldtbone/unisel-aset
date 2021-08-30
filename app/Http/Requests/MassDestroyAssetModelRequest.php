<?php

namespace App\Http\Requests;

use App\Models\AssetModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssetModelRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asset_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asset_models,id',
        ];
    }
}
