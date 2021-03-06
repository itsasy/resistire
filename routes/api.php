<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

//Route::post('login' , 'AuthController@login');
Route::post('logout', 'AuthController@logout');

Route::group(['prefix' => 'news'], function () {
    Route::get('/', 'NewsController@index');
    Route::post('/', 'NewsController@store');
    Route::get("/{id}", 'NewsController@show');
    Route::post("/{id}", 'NewsController@update');
    Route::delete('/{id}', 'NewsController@destroy');
    Route::get('local/district/{idDistrict}', 'NewsController@localNewsbyDistrict');
    
    Route::get('project/{idProject}/district/{idDistrict}/type/{idType}', 'NewsController@news_project_district_type');
});

Route::group(['prefix' => 'adicional'], function () {
    Route::get('/', 'infoAdicionalController@index');
    Route::post('/', 'infoAdicionalController@store');
    Route::get("/{id}", 'infoAdicionalController@show');
    Route::post("/{id}", 'infoAdicionalController@update');
    Route::delete('/{id}', 'infoAdicionalController@destroy');
});

Route::get('/adicionalType/{type}', 'infoAdicionalController@infobyType');
Route::get('/imageInfo/{fileName}', 'infoAdicionalController@imageInfo');
Route::get('/newsType/{type}', 'NewsController@newsbyType');
Route::get('/img/{fileName}', 'NewsController@imageNews');


Route::group(['prefix' => 'points'], function () {
    Route::get('/', 'pointsController@index');
    Route::post('/', 'pointsController@store');
    Route::get("/{id}", 'pointsController@show');
    Route::post("/{id}", 'pointsController@update');
    Route::delete('/{id}', 'pointsController@destroy');
    Route::get('district/{idDistrict}', 'pointsController@showPointsbyDistrict');
    
    Route::get('project/{idProject}/district/{idDistrict}/type/{idType}', 'pointsController@points_project_district_type');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'accountController@index');
    Route::post('/', 'accountController@store');
    Route::get("/{id}", 'accountController@show');
    Route::post("/{id}", 'accountController@update');
    Route::delete('/{id}', 'accountController@destroy');
    Route::get('/document/{document}', 'accountController@showUserbyDocument');
});

Route::group(['prefix' => 'alerts'], function () {
    Route::get('/', 'alertsController@index');
    Route::post('/', 'alertsController@store');
    Route::get('/{id}', 'alertsController@show');
    Route::post('/{id}', 'alertsController@update');
    Route::delete('/{id}', 'alertsController@destroy');
    Route::get('user/{idUser}', 'alertsController@showAlertsUser');
    Route::get('district/{idDistrict}', 'alertsController@showAlertsDistrict');
    Route::get('typeUser/{idType}/{idUser}', 'alertsController@showAlertsTypesbyUser');
    
    Route::get('project/{idProject}/district/{idDistrict}/user/{idUser}', 'alertsController@show_alert_project_district_user');
    Route::get('project/{idProject}/district/{idDistrict}/user/{idUser}/alerttype/{idAlertType}', 'alertsController@show_alert_project_district_user_alerttype');
});

Route::group(['prefix' => 'departments'], function () {
    Route::get('/' , 'departmentController@showDepartments');
    Route::get('/province/{id}', 'departmentController@showProvince');
    Route::get('/district/{id}', 'departmentController@showDistrict');
    Route::get('/location/{latitude}/{longitude}', 'departmentController@getLocation');
    Route::get('/location/rank/{id_project}/{latitude}/{longitude}', 'departmentController@getLocationRank');
    Route::get('/district/{latitude}/{longitude}', 'departmentController@showDistrictbyLatLon');
    Route::get('/province/district/{id}', 'departmentController@showDistrictbyId');
});

Route::get('/unattendedAlert/{idDistrict}/{idproject}', 'alertsController@unattendedAlert');
Route::get('/unattendedAlertNew/{idDistrict}/{idproject}/{idType}', 'alertsController@unattendedAlertNew');
Route::put('/updateAlert/{id}', 'alertsController@updateAlert');
Route::get('/imgPoints/{fileName}', 'pointsController@imagePoints');
Route::get('/imageAlert/{fileName}', 'alertsController@imageAlert');

Route::get('/typeAlerts', 'alertsController@typeAlerts');
Route::get('/typeUsers', 'accountController@userType');
Route::get("/genders", 'accountController@genders');
Route::get("/genders/{id}", 'accountController@gendersbyId');

Route::get("/json", 'departmentController@obtenerUbicacion');

Route::get('/generalPoints', 'pointsController@showGeneralPoints');

Route::group(['prefix' => 'companies'], function(){
    Route::get('/', 'companiesController@index');
    Route::get('/{id}', 'companiesController@show');
    Route::get('/district/{district}','companiesController@companies_by_district');
    Route::get('/{district}/{type}', 'companiesController@companies_by_district_and_type');
    
    Route::get('project/{idProject}/district/{idDistrict}', 'companiesController@points_project_district');
    Route::get('project/{idProject}/district/{idDistrict}/type/{idType}', 'companiesController@points_project_district_type');
});

Route::get('/imageCompany/{fileName}', 'companiesController@imageCompanie');


Route::apiResource('/foodsafety', 'API\foodSafetyController');
Route::get('/foodsafety_dst/{dst}', 'API\foodSafetyController@articles_by_district');
Route::apiResource('/types_foodsafety', 'API\foodSafetyTypesController');
Route::get('/types_foodsafety_dst/{dst}', 'API\foodSafetyTypesController@types_by_district');
Route::get('/food_safety/type/{type}', 'API\foodSafetyController@articles_by_type');

Route::group(['prefix' => 'foodsafetytypes'], function(){
    Route::get('project/{idProject}/district/{idDistrict}', 'API\foodSafetyTypesController@foodsafetytypes_project_district');
});

Route::group(['prefix' => 'foodsafety'], function(){
    Route::get('project/{idProject}/district/{idDistrict}/type/{idType}', 'API\foodSafetyController@foodsafety_project_district_type');
});
