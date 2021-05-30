<?php

use Illuminate\Support\Facades\Route;
use Pratiksh\Laramin\Http\Controllers\Admin\RoleController;
use Pratiksh\Laramin\Http\Controllers\Admin\UserController;
use Pratiksh\Laramin\Http\Controllers\Admin\ProfileController;
use Pratiksh\Laramin\Http\Controllers\Admin\SettingController;
use Pratiksh\Laramin\Http\Controllers\Admin\ActivityController;
use Pratiksh\Laramin\Http\Controllers\Admin\DashboardController;
use Pratiksh\Laramin\Http\Controllers\Admin\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dashboard', [DashboardController::class, 'dashboard']);

// Resource Controller
Route::resource('user', UserController::class);

Route::resource('profile', ProfileController::class, [
    'only' => ['show', 'edit', 'update']
]);

Route::resource('activity', ActivityController::class, [
    'only' => ['index', 'show', 'destroy']
]);

Route::resource('role', RoleController::class);

Route::resource('permission', PermissionController::class);

Route::resource('setting', SettingController::class, [
    'only' => ['index', 'update']
]);

/* ================================================= */

Route::post('make_role_module_permission/{role}', [RoleController::class, 'assignModulePermission']);

Route::get('detach_role_module_permission/{role}/{permission}', [RoleController::class, 'detachModulePermssion']);

Route::patch('change_role_module_permission', [RoleController::class, 'changeModulePermission']);


/* Activitiy Routes */
$this->get('delete-all-activities', [ActivityController::class, 'delete_all_activities']);
$this->get('delete-last-month', [ActivityController::class, 'delete_last_month']);
$this->get('keep-this-month-activities', [ActivityController::class, 'keep_this_month_activities']);
$this->get('keep-latest-two-month-activities', [ActivityController::class, 'keep_latest_two_month_activities']);
$this->get('keep-latest-three-month-activities', [ActivityController::class, 'keep_latest_three_month_activities']);
