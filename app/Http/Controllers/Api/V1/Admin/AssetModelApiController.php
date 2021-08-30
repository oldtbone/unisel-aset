<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssetModelRequest;
use App\Http\Requests\UpdateAssetModelRequest;
use App\Http\Resources\Admin\AssetModelResource;
use App\Models\AssetModel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetModelApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_model_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssetModelResource(AssetModel::with(['asset_type'])->get());
    }

    public function store(StoreAssetModelRequest $request)
    {
        $assetModel = AssetModel::create($request->all());

        return (new AssetModelResource($assetModel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AssetModel $assetModel)
    {
        abort_if(Gate::denies('asset_model_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssetModelResource($assetModel->load(['asset_type']));
    }

    public function update(UpdateAssetModelRequest $request, AssetModel $assetModel)
    {
        $assetModel->update($request->all());

        return (new AssetModelResource($assetModel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AssetModel $assetModel)
    {
        abort_if(Gate::denies('asset_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetModel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
