@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.asset.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.assets.update", [$asset->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="serial_number">{{ trans('cruds.asset.fields.serial_number') }}</label>
                            <input class="form-control" type="text" name="serial_number" id="serial_number" value="{{ old('serial_number', $asset->serial_number) }}" required>
                            @if($errors->has('serial_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('serial_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.serial_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.asset.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $asset->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="asset_tag">{{ trans('cruds.asset.fields.asset_tag') }}</label>
                            <input class="form-control" type="text" name="asset_tag" id="asset_tag" value="{{ old('asset_tag', $asset->asset_tag) }}">
                            @if($errors->has('asset_tag'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('asset_tag') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.asset_tag_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="category_id">{{ trans('cruds.asset.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id" required>
                                @foreach($categories as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $asset->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="asset_model_id">{{ trans('cruds.asset.fields.asset_model') }}</label>
                            <select class="form-control select2" name="asset_model_id" id="asset_model_id" required>
                                @foreach($asset_models as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('asset_model_id') ? old('asset_model_id') : $asset->asset_model->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('asset_model'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('asset_model') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.asset_model_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="room_attach_id">{{ trans('cruds.asset.fields.room_attach') }}</label>
                            <select class="form-control select2" name="room_attach_id" id="room_attach_id" required>
                                @foreach($room_attaches as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('room_attach_id') ? old('room_attach_id') : $asset->room_attach->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('room_attach'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('room_attach') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.room_attach_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="manufacturer_id">{{ trans('cruds.asset.fields.manufacturer') }}</label>
                            <select class="form-control select2" name="manufacturer_id" id="manufacturer_id" required>
                                @foreach($manufacturers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('manufacturer_id') ? old('manufacturer_id') : $asset->manufacturer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('manufacturer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('manufacturer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.manufacturer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="purchase_date">{{ trans('cruds.asset.fields.purchase_date') }}</label>
                            <input class="form-control date" type="text" name="purchase_date" id="purchase_date" value="{{ old('purchase_date', $asset->purchase_date) }}" required>
                            @if($errors->has('purchase_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('purchase_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.purchase_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="status_id">{{ trans('cruds.asset.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id" required>
                                @foreach($statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $asset->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="location_id">{{ trans('cruds.asset.fields.location') }}</label>
                            <select class="form-control select2" name="location_id" id="location_id" required>
                                @foreach($locations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('location_id') ? old('location_id') : $asset->location->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('location'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('location') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.asset.fields.notes') }}</label>
                            <textarea class="form-control" name="notes" id="notes">{{ old('notes', $asset->notes) }}</textarea>
                            @if($errors->has('notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.notes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photos">{{ trans('cruds.asset.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photos') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="assigned_to_id">{{ trans('cruds.asset.fields.assigned_to') }}</label>
                            <select class="form-control select2" name="assigned_to_id" id="assigned_to_id">
                                @foreach($assigned_tos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('assigned_to_id') ? old('assigned_to_id') : $asset->assigned_to->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('assigned_to'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('assigned_to') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.asset.fields.assigned_to_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('frontend.assets.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($asset) && $asset->photos)
          var files =
            {!! json_encode($asset->photos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection