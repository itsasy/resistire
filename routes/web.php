<?php
Route::get('/', 'adminController@index')->name('Index');
Route::post('login', 'Auth\LoginController@login')->name('logeo');
Route::get('logout', 'Auth\LoginController@logout')->name('cerrar-sesion');

//Route::post('/login', 'adminController@login')->name('logeo');


Route::group(['prefix' => 'blog'], function () {
    Route::get('/{seccion}', 'adminController@news')->name('noticias');
    Route::get('/nuevo/{tipo}', 'adminController@regNews')->name('regNews');
    Route::post('/guardar', 'adminController@saveNews')->name('saveNews');
    Route::get('/eliminar/{id}', 'adminController@deleteNews')->name('deleteNews');
    Route::get('/editar/{id}/{tipo}', 'adminController@updateNews')->name('updateNews');
    Route::post('/guarda', 'adminController@saveUpdateNews')->name('saveUpdateNews');
});

Route::group(['prefix' => 'adicional'], function () {
    Route::get('/nuevo', 'adminController@regInfo')->name('regInfo');
    Route::post('/guardar', 'adminController@saveInfo')->name('saveInfo');
    Route::get('/eliminar/{id}', 'adminController@deleteInfo')->name('deleteInfo');
    Route::get('/editar/{id}', 'adminController@updateInfo')->name('updateInfo');
    Route::post('/guarda', 'adminController@saveUpdateInfo')->name('saveUpdateInfo');
});

Route::group(['prefix' => 'puntos'], function () {
    Route::get('/nuevo', 'adminController@regPoint')->name('regPoint');
    Route::post('/guardar', 'adminController@savePoint')->name('savePoint');
    Route::get('/eliminar/{id}', 'adminController@deletePoint')->name('deletePoint');
    Route::get('/editar/{id}', 'adminController@updatePoint')->name('updatePoint');
    Route::post('/guarda', 'adminController@saveUpdatePoint')->name('saveUpdatePoint');
});
Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'adminController@usersList')->name('listUsuarios');
    Route::get('/editar/{id}', 'adminController@editUser')->name('editUser');
    Route::post('/guarda', 'adminController@editUser')->name('saveUser');
    Route::get('/eliminar/{id}', 'adminController@deleteUser')->name('deleteUser');
    Route::get('ban/{id}', 'adminController@banUser')->name('banUser');
});

Route::group(['prefix' => 'alerts'], function () {
    Route::get('/', 'adminController@alertList')->name('alertList');
    Route::get('/eliminar/{id}', 'adminController@deleteAlert')->name('deleteAlert');
});

/* ESTADISTICAS */

Route::get('/estadisticas', 'adminController@mostrarEstadisticas')->name('mostrarEstadisticas');

Route::get('/estadisticas/detalles/mes', 'adminController@obtenerNroAlertasPorFecha')->name('obtenerNroAlertasPorFecha');


Route::get('/Map/{district}/{id}/{provincia}', 'adminController@Mapa')->name('Mapa');
Route::get('/MapAsociates/{district}/{id}/{provincia}', 'adminController@MapaAsociates')->name('MapAsociates');

Route::get('/excel', 'adminController@Excel')->name('excel');

Route::get('/test-websocket', 'alertsController@testComunication');
Route::get('/test-email', 'accountController@testEmail');


/*companies*/

Route::group(['prefix' => 'asociados'], function () {
    Route::get('/', 'adminController@listCompanies')->name('mapAssociate');
    Route::get('/nuevo', 'adminController@regCompanies')->name('regCompanies');
    Route::post('/guardar', 'adminController@saveCompanies')->name('saveCompanies');
    Route::get('/eliminar/{id}', 'adminController@deleteCompanies')->name('deleteCompanies');
    Route::get('/editar/{id}', 'adminController@updateCompanies')->name('editCompanies');
    Route::post('/guarda', 'adminController@saveUpdateCompanies')->name('saveUpdateCompanies');
    Route::get('ban/{id}', 'adminController@banCompanies')->name('banCompanies');
    Route::get('/categoria', 'CompaniesTypeController@index')->name('allAsociates');
    Route::get('/categoria/{id}', 'CompaniesTypeController@show')->name('show_asociate');
    Route::post('/categoria', 'CompaniesTypeController@store')->name('save_company_category');
});

Route::resource('alimentos', 'foodSafetyController');
Route::resource('tipo_alimentos', 'foodSafetyTypesController');
Route::get('/toChart', 'adminController@toChart');

Route::get('/noticias-locales', 'adminController@local_news')->name('local_news');
Route::get('/instituciones-publicas', 'adminController@public_institutions')->name('public_institutions');