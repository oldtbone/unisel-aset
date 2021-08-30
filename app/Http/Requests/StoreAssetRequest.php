<?php

namespace App\Http\Requests;

use App\Models\Asset;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_create');
    }

    public function rules()
    {
        return [
            'serial_number' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'asset_tag' => [
                'string',
                'nullable',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'asset_model_id' => [
                'required',
                'integer',
            ],
            'room_attach_id' => [
                'required',
                'integer',
            ],
            'manufacturer_id' => [
                'required',
                'integer',
            ],
            'purchase_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'location_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
