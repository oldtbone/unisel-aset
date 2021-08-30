<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Asset Category
    Route::apiResource('asset-categories', 'AssetCategoryApiController');

    // Asset Location
    Route::apiResource('asset-locations', 'AssetLocationApiController');

    // Asset Status
    Route::apiResource('asset-statuses', 'AssetStatusApiController');

    // Asset
    Route::post('assets/media', 'AssetApiController@storeMedia')->name('assets.storeMedia');
    Route::apiResource('assets', 'AssetApiController');

    // Assets History
    Route::apiResource('assets-histories', 'AssetsHistoryApiController', ['except' => ['store', 'show', 'update', 'destroy']]);

    // Faculty
    Route::apiResource('faculties', 'FacultyApiController');

    // Department
    Route::apiResource('departments', 'DepartmentApiController');

    // Programme
    Route::apiResource('programmes', 'ProgrammeApiController');

    // Manufacturer
    Route::apiResource('manufacturers', 'ManufacturerApiController');

    // Room Type
    Route::apiResource('room-types', 'RoomTypeApiController');

    // Asset Type
    Route::apiResource('asset-types', 'AssetTypeApiController');

    // Asset Model
    Route::apiResource('asset-models', 'AssetModelApiController');

    // Designation
    Route::apiResource('designations', 'DesignationApiController');

    // Rooms
    Route::post('rooms/media', 'RoomsApiController@storeMedia')->name('rooms.storeMedia');
    Route::apiResource('rooms', 'RoomsApiController');

    // Room Booking
    Route::apiResource('room-bookings', 'RoomBookingApiController');

    // Room Booking History
    Route::apiResource('room-booking-histories', 'RoomBookingHistoryApiController', ['except' => ['store', 'show', 'update', 'destroy']]);
});
