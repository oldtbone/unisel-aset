<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Asset Category
    Route::delete('asset-categories/destroy', 'AssetCategoryController@massDestroy')->name('asset-categories.massDestroy');
    Route::resource('asset-categories', 'AssetCategoryController');

    // Asset Location
    Route::delete('asset-locations/destroy', 'AssetLocationController@massDestroy')->name('asset-locations.massDestroy');
    Route::resource('asset-locations', 'AssetLocationController');

    // Asset Status
    Route::delete('asset-statuses/destroy', 'AssetStatusController@massDestroy')->name('asset-statuses.massDestroy');
    Route::resource('asset-statuses', 'AssetStatusController');

    // Asset
    Route::delete('assets/destroy', 'AssetController@massDestroy')->name('assets.massDestroy');
    Route::post('assets/media', 'AssetController@storeMedia')->name('assets.storeMedia');
    Route::post('assets/ckmedia', 'AssetController@storeCKEditorImages')->name('assets.storeCKEditorImages');
    Route::resource('assets', 'AssetController');

    // Assets History
    Route::resource('assets-histories', 'AssetsHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Faculty
    Route::delete('faculties/destroy', 'FacultyController@massDestroy')->name('faculties.massDestroy');
    Route::resource('faculties', 'FacultyController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // Programme
    Route::delete('programmes/destroy', 'ProgrammeController@massDestroy')->name('programmes.massDestroy');
    Route::resource('programmes', 'ProgrammeController');

    // Manufacturer
    Route::delete('manufacturers/destroy', 'ManufacturerController@massDestroy')->name('manufacturers.massDestroy');
    Route::resource('manufacturers', 'ManufacturerController');

    // Room Type
    Route::delete('room-types/destroy', 'RoomTypeController@massDestroy')->name('room-types.massDestroy');
    Route::resource('room-types', 'RoomTypeController');

    // Asset Type
    Route::delete('asset-types/destroy', 'AssetTypeController@massDestroy')->name('asset-types.massDestroy');
    Route::resource('asset-types', 'AssetTypeController');

    // Asset Model
    Route::delete('asset-models/destroy', 'AssetModelController@massDestroy')->name('asset-models.massDestroy');
    Route::resource('asset-models', 'AssetModelController');

    // Designation
    Route::delete('designations/destroy', 'DesignationController@massDestroy')->name('designations.massDestroy');
    Route::resource('designations', 'DesignationController');

    // Rooms
    Route::delete('rooms/destroy', 'RoomsController@massDestroy')->name('rooms.massDestroy');
    Route::post('rooms/media', 'RoomsController@storeMedia')->name('rooms.storeMedia');
    Route::post('rooms/ckmedia', 'RoomsController@storeCKEditorImages')->name('rooms.storeCKEditorImages');
    Route::resource('rooms', 'RoomsController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Room Booking
    Route::delete('room-bookings/destroy', 'RoomBookingController@massDestroy')->name('room-bookings.massDestroy');
    Route::resource('room-bookings', 'RoomBookingController');

    // Room Booking History
    Route::resource('room-booking-histories', 'RoomBookingHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Asset Category
    Route::delete('asset-categories/destroy', 'AssetCategoryController@massDestroy')->name('asset-categories.massDestroy');
    Route::resource('asset-categories', 'AssetCategoryController');

    // Asset Location
    Route::delete('asset-locations/destroy', 'AssetLocationController@massDestroy')->name('asset-locations.massDestroy');
    Route::resource('asset-locations', 'AssetLocationController');

    // Asset Status
    Route::delete('asset-statuses/destroy', 'AssetStatusController@massDestroy')->name('asset-statuses.massDestroy');
    Route::resource('asset-statuses', 'AssetStatusController');

    // Asset
    Route::delete('assets/destroy', 'AssetController@massDestroy')->name('assets.massDestroy');
    Route::post('assets/media', 'AssetController@storeMedia')->name('assets.storeMedia');
    Route::post('assets/ckmedia', 'AssetController@storeCKEditorImages')->name('assets.storeCKEditorImages');
    Route::resource('assets', 'AssetController');

    // Assets History
    Route::resource('assets-histories', 'AssetsHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Faculty
    Route::delete('faculties/destroy', 'FacultyController@massDestroy')->name('faculties.massDestroy');
    Route::resource('faculties', 'FacultyController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // Programme
    Route::delete('programmes/destroy', 'ProgrammeController@massDestroy')->name('programmes.massDestroy');
    Route::resource('programmes', 'ProgrammeController');

    // Manufacturer
    Route::delete('manufacturers/destroy', 'ManufacturerController@massDestroy')->name('manufacturers.massDestroy');
    Route::resource('manufacturers', 'ManufacturerController');

    // Room Type
    Route::delete('room-types/destroy', 'RoomTypeController@massDestroy')->name('room-types.massDestroy');
    Route::resource('room-types', 'RoomTypeController');

    // Asset Type
    Route::delete('asset-types/destroy', 'AssetTypeController@massDestroy')->name('asset-types.massDestroy');
    Route::resource('asset-types', 'AssetTypeController');

    // Asset Model
    Route::delete('asset-models/destroy', 'AssetModelController@massDestroy')->name('asset-models.massDestroy');
    Route::resource('asset-models', 'AssetModelController');

    // Designation
    Route::delete('designations/destroy', 'DesignationController@massDestroy')->name('designations.massDestroy');
    Route::resource('designations', 'DesignationController');

    // Rooms
    Route::delete('rooms/destroy', 'RoomsController@massDestroy')->name('rooms.massDestroy');
    Route::post('rooms/media', 'RoomsController@storeMedia')->name('rooms.storeMedia');
    Route::post('rooms/ckmedia', 'RoomsController@storeCKEditorImages')->name('rooms.storeCKEditorImages');
    Route::resource('rooms', 'RoomsController');

    // Room Booking
    Route::delete('room-bookings/destroy', 'RoomBookingController@massDestroy')->name('room-bookings.massDestroy');
    Route::resource('room-bookings', 'RoomBookingController');

    // Room Booking History
    Route::resource('room-booking-histories', 'RoomBookingHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
