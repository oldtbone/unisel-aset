<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('booking_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/room-bookings*") ? "c-show" : "" }} {{ request()->is("admin/room-booking-histories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-bookmark c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.bookingManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('room_booking_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.room-bookings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/room-bookings") || request()->is("admin/room-bookings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.roomBooking.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('room_booking_history_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.room-booking-histories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/room-booking-histories") || request()->is("admin/room-booking-histories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-th-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.roomBookingHistory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('asset_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/assets*") ? "c-show" : "" }} {{ request()->is("admin/assets-histories*") ? "c-show" : "" }} {{ request()->is("admin/asset-statuses*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.assetManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('asset_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.assets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assets") || request()->is("admin/assets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.asset.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('assets_history_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.assets-histories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/assets-histories") || request()->is("admin/assets-histories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-th-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetsHistory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-statuses") || request()->is("admin/asset-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetStatus.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('room_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/rooms*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.roomManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('room_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.rooms.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/rooms") || request()->is("admin/rooms/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-door-closed c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.room.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('setup_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/faculties*") ? "c-show" : "" }} {{ request()->is("admin/departments*") ? "c-show" : "" }} {{ request()->is("admin/programmes*") ? "c-show" : "" }} {{ request()->is("admin/asset-locations*") ? "c-show" : "" }} {{ request()->is("admin/asset-categories*") ? "c-show" : "" }} {{ request()->is("admin/manufacturers*") ? "c-show" : "" }} {{ request()->is("admin/room-types*") ? "c-show" : "" }} {{ request()->is("admin/asset-types*") ? "c-show" : "" }} {{ request()->is("admin/asset-models*") ? "c-show" : "" }} {{ request()->is("admin/designations*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-wrench c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setupManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('faculty_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faculties.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faculties") || request()->is("admin/faculties/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dice-six c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faculty.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('department_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.departments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-warehouse c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.department.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('programme_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.programmes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/programmes") || request()->is("admin/programmes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-signature c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.programme.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_location_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-locations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-locations") || request()->is("admin/asset-locations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-map-marker c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetLocation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-categories") || request()->is("admin/asset-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('manufacturer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.manufacturers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/manufacturers") || request()->is("admin/manufacturers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-industry c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.manufacturer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('room_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.room-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/room-types") || request()->is("admin/room-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hotel c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.roomType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-types") || request()->is("admin/asset-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-barcode c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('asset_model_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.asset-models.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/asset-models") || request()->is("admin/asset-models/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-barcode c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.assetModel.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('designation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.designations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/designations") || request()->is("admin/designations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-tie c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.designation.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>