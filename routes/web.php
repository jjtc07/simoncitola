<?php

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

Auth::routes();

Route::name('users_path')->get('/', function () {
    return redirect('/login');
});

Route::get('prueba', function(){
	return view('prueba');
});

Route::get('prueba/{value?}', 'PruebaController@singularSpanol');

Route::group(['middleware' => 'auth'], function(){

    ############################################################################
    #                             Inscripción                                  #
    ############################################################################

    ////////////// Ruta inscripciones ///////////////////////////////////
    Route::resource('inscripciones', 'InscripcionController');

    ////////////// Ruta alumnos ///////////////////////////////////
    Route::resource('alumnos', 'AlumnoController');

    ////////////// Ruta representantes ///////////////////////////////////
    Route::resource('representantes', 'RepresentanteController');

    Route::name('representantes.find')->get('representantes/{cedula}/find', 'RepresentanteController@find');

    Route::name('home_path')->get('/home', 'HomeController@index');

    ############################################################################
    #                           Calendario                                     #
    ############################################################################
    
    # Dias
    Route::name('dias.show')->get('dias/{anio}/find', 'DiaController@show');
    

    /****************************** Admin *************************************/
    Route::group(['middleware' => 'administrador'], function(){

        #Dias
        Route::name('dias.update')->put('dias/{anio}', 'DiaController@update');

        ########################################################################
        #                           Admnistración                              #
        ########################################################################
        
        # Cargos
        Route::resource('cargos', 'CargoController');

        # Estados
        Route::resource('estados', 'EstadoController');

        # Motivos
        Route::resource('motivos', 'MotivoController');
        
        # Periodos
        Route::resource('periodos', 'PeriodoController');

        # Parentescos
        Route::resource('parentescos', 'ParentescoController');

        # Roles
        Route::resource('roles', 'RolController');

        # Empleados        
        Route::resource('empleados', 'EmpleadoController');

        ########################################################################
        #                             Seguridad                                #
        ########################################################################

        # Empleados        
        Route::resource('usuarios', 'UsuarioController');


        //////////////////// Dias Laborables////////////////
        //Route::get('diaLaborables','DiaLaborableController@index');
    });

    ############################################################################
    #                             Asistencias                                  #
    ############################################################################
        Route::name('asistenciaEmpleado.create')->get('asistenciaEmpleado/crear/{id}', 'AsistenciaEmpleadoController@create');
        Route::resource('asistenciaEmpleado', 'AsistenciaEmpleadoController');
        Route::post('inasistenciaEmpleado','AsistenciaEmpleadoController@storeInasistencia');

});
