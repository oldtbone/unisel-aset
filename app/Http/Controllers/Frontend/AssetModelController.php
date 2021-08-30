<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetModelRequest;
use App\Http\Requests\StoreAssetModelRequest;
use App\Http\Requests\UpdateAssetModelRequest;
use App\Models\AssetModel;
use App\Models\AssetType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetModelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_model_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetModels = AssetModel::with(['asset_type'])->get();

        return view('frontend.assetModels.index', compact('assetModels'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_model_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_types = AssetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.assetModels.create', compact('asset_types'));
    }

    public function store(StoreAssetModelRequest $request)
    {
        $assetModel = AssetModel::create($request->all());

        return redirect()->route('frontend.asset-models.index');
    }

    public function edit(AssetModel $assetModel)
    {
        abort_if(Gate::denies('asset_model_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_types = AssetType::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assetModel->load('asset_type');

        return view('frontend.assetModels.edit', compact('asset_types', 'assetModel'));
    }

    public function update(UpdateAssetModelRequest $request, AssetModel $assetModel)
    {
        $assetModel->update($request->all());

        return redirect()->route('frontend.asset-models.index');
    }

    public function show(AssetModel $assetModel)
    {
        abort_if(Gate::denies('asset_model_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetModel->load('asset_type');

        return view('frontend.assetModels.show', compact('assetModel'));
    }

    public function destroy(AssetModel $assetModel)
    {
        abort_if(Gate::denies('asset_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetModel->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetModelRequest $request)
    {
        AssetModel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
