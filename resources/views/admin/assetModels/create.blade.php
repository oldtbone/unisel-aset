@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.assetModel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.asset-models.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.assetModel.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assetModel.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="asset_type_id">{{ trans('cruds.assetModel.fields.asset_type') }}</label>
                <select class="form-control select2 {{ $errors->has('asset_type') ? 'is-invalid' : '' }}" name="asset_type_id" id="asset_type_id" required>
                    @foreach($asset_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('asset_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('asset_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('asset_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assetModel.fields.asset_type_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection