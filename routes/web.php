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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/showStudents','adminController@showStudents')->name('showStudents');

Route::get('/addStudent', 'adminController@createStudent')->name('addStudent');
Route::post('/createStudent', 'adminController@storeStudent')->name('storeStudent');


Route::get('/updateStudent/{id}', 'adminController@updateStudent')->name('updateStudent');
Route::get('/updateStoreStudent/{id}', 'adminController@storeUpdateStudent')->name('updatedStudent');

Route::get('/deleteStudent/{id}', 'adminController@deleteStudent')->name('deleteStudent');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


use App\student;
use Illuminate\Support\Facades\Input;
 
Route::get ( '/search', function () {
    return view ( 'search' );
} );
Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    $student = student::where ( 'imie', 'LIKE', '%' . $q . '%' )
                ->orWhere ( 'nazwisko', 'LIKE', '%' . $q . '%' )
                ->orWhere ( 'data_urodzenia', 'LIKE', '%' . $q . '%' )
                ->orWhere ( 'wiek', 'LIKE', '%' . $q . '%' )
                ->orWhere ( 'klasa', 'LIKE', '%' . $q . '%' )
                ->orWhere ( 'plec', 'LIKE', '%' . $q . '%' )
                ->orWhere ( 'ocena', 'LIKE', '%' . $q . '%' )
                ->orWhere ( 'pesel', 'LIKE', '%' . $q . '%' )
                ->get ();
    if($q==null) return view ( 'search' )->withMessage ( 'Nie podałeś żadnych danych!' );
    if (count ( $student ) > 0){
        return view ( 'search' )->withDetails ( $student )->withQuery ( $q );}
    else{
        return view ( 'search' )->withMessage ( 'Brak studentów spełniających podane kryteria!' );}
} );