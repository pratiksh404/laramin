<div class="main-menu {{config('laramin.vertical_manu_classes','menu-fixed menu-shadow menu-accordion')}} {{config('laramin.vertical_menu_color','menu-light')}} {{config('laramin.menu_disabled',false) ? 'disabled' : ''}}"
        data-scroll-to-active="true">
        <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        {{--                         <li class=" navigation-header"><span>General</span><i class=" feather icon-minus"
                                        data-toggle="tooltip" data-placement="right" data-original-title="HMS"></i>
                        </li> --}}
                        <li class=" nav-item"><a href="{{adminRedirectRoute('dashboard')}}"><i
                                                class="feather icon-home"></i><span class="menu-title"
                                                data-i18n="Dashboard">Dashboard</span></a>
                        </li>

                        {{-- ============================USER MANAGEMENT============================ --}}
                        @if (auth()->user()->can('view-any',\App\Models\User::class) ||
                        auth()->user()->can('create',\App\Models\User::class) )
                        <li class=" nav-item"><a href="#"><i class="feather icon-users"></i><span class="menu-title"
                                                data-i18n="User Management">User
                                                Management</span></a>
                                <ul class="menu-content">
                                        @if (auth()->user()->can('view-any',\App\Models\User::class))
                                        <li><a class="menu-item" href="{{adminRedirectRoute('user')}}"
                                                        data-i18n="All Users"><i class="feather icon-user"></i>All
                                                        Users</a>
                                        </li>
                                        @endif
                                        @if (auth()->user()->can('create',\App\Models\User::class))
                                        <li><a class="menu-item" href="{{adminCreateRoute('user')}}"
                                                        data-i18n="Create Users"><i
                                                                class="feather icon-user-plus"></i>Create User</a>
                                        </li>
                                        @endif
                                </ul>
                        </li>
                        @endif
                        {{-- ===========================END USER MANAGEMENT=========================== --}}

                        {{-- ==========================ROLES AND PERMISSION========================== --}}
                        @if (auth()->user()->can('view-any',\App\Models\Admin\Role::class) ||
                        auth()->user()->can('create',\App\Models\Admin\Role::class) ||
                        auth()->user()->can('view-any',\App\Models\Admin\Permission::class) ||
                        auth()->user()->can('create',\App\Models\Admin\Permission::class))
                        <li class=" nav-item"><a href="#"><i class="feather icon-unlock"></i><span class="menu-title"
                                                data-i18n="Roles/Permissions">Roles/Permissions</span></a>
                                <ul class="menu-content">
                                        @if (auth()->user()->can('view-any',\App\Models\Admin\Role::class) ||
                                        auth()->user()->can('create',\App\Models\Admin\Role::class))
                                        <li class=" nav-item"><a href="#"><i class="feather icon-award"></i><span
                                                                class="menu-title" data-i18n="Roles">Roles</span></a>
                                                <ul class="menu-content">
                                                        @if(auth()->user()->can('view-any',\App\Models\Admin\Role::class))
                                                        <li><a class="menu-item" href="{{adminRedirectRoute('role')}}"
                                                                        data-i18n="All Roles">All
                                                                        Roles</a>
                                                        </li>
                                                        @endif
                                                        @if(auth()->user()->can('create',\App\Models\Admin\Role::class))
                                                        <li><a class="menu-item" href="{{adminCreateRoute('role')}}"
                                                                        data-i18n="Create Role">Create Role</a>
                                                        </li>
                                                        @endif
                                                </ul>
                                        </li>
                                        @endif
                                        @if (auth()->user()->can('view-any',\App\Models\Admin\Permission::class) ||
                                        auth()->user()->can('create',\App\Models\Admin\Permission::class))
                                        <li class=" nav-item"><a href="#"><i class="feather icon-log-in"></i><span
                                                                class="menu-title"
                                                                data-i18n="Permissions">Permissions</span></a>
                                                <ul class="menu-content">
                                                        @if(auth()->user()->can('view-any',\App\Models\Admin\Permission::class))
                                                        <li><a class="menu-item"
                                                                        href="{{adminRedirectRoute('permission')}}"
                                                                        data-i18n="All Permissions">All
                                                                        Permissions</a>
                                                        </li>
                                                        @endif
                                                        @if(auth()->user()->can('create',\App\Models\Admin\Permission::class))
                                                        <li><a class="menu-item"
                                                                        href="{{adminCreateRoute('permission')}}"
                                                                        data-i18n="Create Permission">Create
                                                                        Permission</a>
                                                        </li>
                                                        @endif
                                                </ul>
                                        </li>
                                        @endif
                                </ul>
                        </li>
                        @endif

                        {{-- =============================Activities Log============================= --}}
                        @hasRole('admin')
                        <li class=" nav-item"><a href="{{adminRedirectRoute('activity')}}"><i
                                                class="feather icon-activity"></i><span class="menu-title"
                                                data-i18n="Activity">Activity</span></a>
                        </li>
                        @endhasRole
                        {{-- ========================================================================= --}}

                        {{-- ======================= Setting =================================== --}}
                        @if (auth()->user()->can('view-any',\App\Models\Admin\Setting::class) ||
                        auth()->user()->can('create',\App\Models\Admin\Setting::class))
                        <li class=" nav-item"><a href="{{adminRedirectRoute('setting')}}"><i
                                                class="feather icon-settings"></i><span class="menu-title"
                                                data-i18n="Setting">Setting</span></a>
                        </li>
                        @endif
                        {{-- ========================================================================= --}}

                        {{-- =========================END ROLE AND PERMISSION========================= --}}
                        <li class=" nav-item"><a
                                        href="https://pixinvent.com/stack-bootstrap-admin-template/documentation"
                                        target="_blank"><i class="feather icon-folder"></i><span class="menu-title"
                                                data-i18n="Documentation">Documentation</span></a>
                        </li>
                </ul>
        </div>
</div>