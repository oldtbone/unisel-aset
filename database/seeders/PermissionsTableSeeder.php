<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 24,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 25,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 26,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 27,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 28,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 29,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 30,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 31,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 32,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 33,
                'title' => 'asset_create',
            ],
            [
                'id'    => 34,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 35,
                'title' => 'asset_show',
            ],
            [
                'id'    => 36,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 37,
                'title' => 'asset_access',
            ],
            [
                'id'    => 38,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 39,
                'title' => 'faculty_create',
            ],
            [
                'id'    => 40,
                'title' => 'faculty_edit',
            ],
            [
                'id'    => 41,
                'title' => 'faculty_show',
            ],
            [
                'id'    => 42,
                'title' => 'faculty_delete',
            ],
            [
                'id'    => 43,
                'title' => 'faculty_access',
            ],
            [
                'id'    => 44,
                'title' => 'setup_management_access',
            ],
            [
                'id'    => 45,
                'title' => 'department_create',
            ],
            [
                'id'    => 46,
                'title' => 'department_edit',
            ],
            [
                'id'    => 47,
                'title' => 'department_show',
            ],
            [
                'id'    => 48,
                'title' => 'department_delete',
            ],
            [
                'id'    => 49,
                'title' => 'department_access',
            ],
            [
                'id'    => 50,
                'title' => 'programme_create',
            ],
            [
                'id'    => 51,
                'title' => 'programme_edit',
            ],
            [
                'id'    => 52,
                'title' => 'programme_show',
            ],
            [
                'id'    => 53,
                'title' => 'programme_delete',
            ],
            [
                'id'    => 54,
                'title' => 'programme_access',
            ],
            [
                'id'    => 55,
                'title' => 'manufacturer_create',
            ],
            [
                'id'    => 56,
                'title' => 'manufacturer_edit',
            ],
            [
                'id'    => 57,
                'title' => 'manufacturer_show',
            ],
            [
                'id'    => 58,
                'title' => 'manufacturer_delete',
            ],
            [
                'id'    => 59,
                'title' => 'manufacturer_access',
            ],
            [
                'id'    => 60,
                'title' => 'room_type_create',
            ],
            [
                'id'    => 61,
                'title' => 'room_type_edit',
            ],
            [
                'id'    => 62,
                'title' => 'room_type_show',
            ],
            [
                'id'    => 63,
                'title' => 'room_type_delete',
            ],
            [
                'id'    => 64,
                'title' => 'room_type_access',
            ],
            [
                'id'    => 65,
                'title' => 'asset_type_create',
            ],
            [
                'id'    => 66,
                'title' => 'asset_type_edit',
            ],
            [
                'id'    => 67,
                'title' => 'asset_type_show',
            ],
            [
                'id'    => 68,
                'title' => 'asset_type_delete',
            ],
            [
                'id'    => 69,
                'title' => 'asset_type_access',
            ],
            [
                'id'    => 70,
                'title' => 'asset_model_create',
            ],
            [
                'id'    => 71,
                'title' => 'asset_model_edit',
            ],
            [
                'id'    => 72,
                'title' => 'asset_model_show',
            ],
            [
                'id'    => 73,
                'title' => 'asset_model_delete',
            ],
            [
                'id'    => 74,
                'title' => 'asset_model_access',
            ],
            [
                'id'    => 75,
                'title' => 'designation_create',
            ],
            [
                'id'    => 76,
                'title' => 'designation_edit',
            ],
            [
                'id'    => 77,
                'title' => 'designation_show',
            ],
            [
                'id'    => 78,
                'title' => 'designation_delete',
            ],
            [
                'id'    => 79,
                'title' => 'designation_access',
            ],
            [
                'id'    => 80,
                'title' => 'room_management_access',
            ],
            [
                'id'    => 81,
                'title' => 'room_create',
            ],
            [
                'id'    => 82,
                'title' => 'room_edit',
            ],
            [
                'id'    => 83,
                'title' => 'room_show',
            ],
            [
                'id'    => 84,
                'title' => 'room_delete',
            ],
            [
                'id'    => 85,
                'title' => 'room_access',
            ],
            [
                'id'    => 86,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 87,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 88,
                'title' => 'booking_management_access',
            ],
            [
                'id'    => 89,
                'title' => 'room_booking_create',
            ],
            [
                'id'    => 90,
                'title' => 'room_booking_edit',
            ],
            [
                'id'    => 91,
                'title' => 'room_booking_show',
            ],
            [
                'id'    => 92,
                'title' => 'room_booking_delete',
            ],
            [
                'id'    => 93,
                'title' => 'room_booking_access',
            ],
            [
                'id'    => 94,
                'title' => 'room_booking_history_access',
            ],
            [
                'id'    => 95,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
