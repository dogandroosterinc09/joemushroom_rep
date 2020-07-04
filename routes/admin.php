<?php

/* dashboard routes */
Route::get('/', function () {
    return redirect('/admin/dashboard');
});

/* dashboard */
Route::get('/dashboard', [
    'uses' => '\App\Http\Controllers\AdminDashboardController@index',
    'as' => 'admin.dashboard',
]);
/* dashboard */

/* users */
Route::get('/users/draw',
    ['as' => 'admin.users.draw',
        'uses' => '\App\Http\Controllers\UserController@draw']
);

Route::resource('/users', 'UserController', [
    'as' => 'admin'
]);

Route::delete('/users/{id}/delete',
    ['as' => 'admin.users.delete',
        'uses' => '\App\Http\Controllers\UserController@destroy']
);
/* users */

/* roles */
Route::resource('/roles', 'RoleController', [
    'as' => 'admin'
]);

Route::delete('/roles/{id}/delete',
    ['as' => 'admin.roles.delete',
        'uses' => '\App\Http\Controllers\RoleController@destroy']
);
/* roles */

/* permissions */
Route::resource('/permissions', 'PermissionController', [
    'as' => 'admin'
]);

Route::delete('/permissions/{id}/delete',
    ['as' => 'admin.permissions.delete',
        'uses' => '\App\Http\Controllers\PermissionController@destroy']
);
/* permissions */

/* permission groups */
Route::resource('/permission_groups', 'PermissionGroupController', [
    'as' => 'admin'
]);

Route::delete('/permission_groups/{id}/delete',
    ['as' => 'admin.permission_groups.delete',
        'uses' => '\App\Http\Controllers\PermissionGroupController@destroy']
);
/* permission groups */

/* system settings */
Route::resource('/system_settings', 'SystemSettingController', [
    'as' => 'admin',
]);

Route::delete('/system_settings/{id}/delete',
    ['as' => 'admin.system_settings.delete',
        'uses' => '\App\Http\Controllers\SystemSettingController@destroy']
);
/* system settings */

/* posts */
Route::resource('/posts', 'PostController', [
    'as' => 'admin'
]);

Route::delete('/posts/{id}/delete',
    ['as' => 'admin.posts.delete',
        'uses' => '\App\Http\Controllers\PostController@destroy']
);
/* posts */

/* pages */
Route::resource('/pages', 'PageController', [
    'as' => 'admin'
]);

Route::delete('/pages/{id}/delete',
    ['as' => 'admin.pages.delete',
        'uses' => '\App\Http\Controllers\PageController@destroy']
);
/* pages */

/* ckeditor image upload */
Route::post('/ckeditor_image_upload',
    ['as' => 'admin.ckeditor_image_upload',
        'uses' => '\App\Http\Controllers\PageController@ckEditorImageUpload']
);
/* ckeditor image upload */

Route::post('/upload', '\App\Http\Controllers\PageController@upload')->name('admin.upload');

/* home_slides */
Route::resource('/home_slides', 'HomeSlideController', [
    'as' => 'admin'
]);

Route::delete('/home_slides/{id}/delete',
    ['as' => 'admin.home_slides.delete',
        'uses' => '\App\Http\Controllers\HomeSlideController@destroy']
);
/* home_slides */

/* contacts */
Route::resource('/contacts', 'ContactController', [
    'as' => 'admin'
]);

Route::delete('/contacts/{id}/delete',
    ['as' => 'admin.contacts.delete',
        'uses' => '\App\Http\Controllers\ContactController@destroy']
);
/* contacts */

/* presses */


/* Facility Archive */
Route::get('/facility', [
    'uses' => '\App\Http\Controllers\FacilityController@index',
    'as' => 'admin.pages.facilities.index',
]);

Route::get('/facility_create', [
    'uses' => '\App\Http\Controllers\FacilityController@facilityCreate',
    'as' => 'admin.pages.facilities.create',
]);

Route::get('/facility_edit/{id}',
    ['as' => 'admin.pages.facilities.edit',
        'uses' => '\App\Http\Controllers\FacilityController@facilityEdit']
);

Route::post('/facility_store', '\App\Http\Controllers\FacilityController@storeFacility')->name('storeFacility');

Route::post('/facility_update/{id}', '\App\Http\Controllers\FacilityController@updateFacility')->name('updateFacility');

Route::post('/facility_delete', '\App\Http\Controllers\FacilityController@deleteFacility')->name('deleteFacility');



/* Team Member */
Route::get('/team', [
    'uses' => '\App\Http\Controllers\TeamController@index',
    'as' => 'admin.pages.team.index',
]);

Route::get('/team_create', [
    'uses' => '\App\Http\Controllers\TeamController@teamCreate',
    'as' => 'admin.pages.team.create',
]);

Route::get('/team_edit/{id}',
    ['as' => 'admin.pages.team.edit',
        'uses' => '\App\Http\Controllers\TeamController@teamEdit']
);

Route::post('/team_store', '\App\Http\Controllers\TeamController@storeTeam')->name('storeTeam');

Route::post('/team_update/{id}', '\App\Http\Controllers\TeamController@updateTeam')->name('updateTeam');

Route::post('/team_delete', '\App\Http\Controllers\TeamController@deleteTeam')->name('deleteTeam');



/*Route::resource('/faqs', 'FAQController', [
    'as' => 'admin'
]);

*/
