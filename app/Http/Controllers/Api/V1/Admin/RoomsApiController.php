<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Resources\Admin\RoomResource;
use App\Models\Room;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RoomResource(Room::with(['room_type', 'location'])->get());
    }

    public function store(StoreRoomRequest $request)
    {
        $room = Room::create($request->all());

        if ($request->input('image', false)) {
            $room->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        return (new RoomResource($room))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Room $room)
    {
        abort_if(Gate::denies('room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RoomResource($room->load(['room_type', 'location']));
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room->update($request->all());

        if ($request->input('image', false)) {
            if (!$room->image || $request->input('image') !== $room->image->file_name) {
                if ($room->image) {
                    $room->image->delete();
                }
                $room->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($room->image) {
            $room->image->delete();
        }

        return (new RoomResource($room))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Room $room)
    {
        abort_if(Gate::denies('room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $room->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
