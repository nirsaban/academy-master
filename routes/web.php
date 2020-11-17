<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//student routes
Route::get('/student','PagesController@studentHome')->middleware('StudentRole');
Route::post('profile/update','ProfileController@update');
Route::get('/profile/{id}','ProfileController@show')->name('myProfile')->middleware('StudentRole');
Route::delete('/profile/reset','ProfileController@reset');
Route::post('image-upload', 'ProfileController@imageUploadPost')->name('image.upload.post');
Route::get('/formatCv','ProfileController@cvFormat')->middleware('StudentRole');;
Route::get('/getInputs/{item}','ProfileController@getInput');
Route::post('uploadCv', 'ProfileController@CvUploadPost')->name('upload.cvToCheck');
Route::get('profileData/{id}','ProfileController@getProfileData');
Route::get('BuildPortFolio/{id}','ProfileController@showPortFolio');
Route::post('addPhoto','ProfileController@addPhoto')->name('addPhoto');
Route::post('addInput','ProfileController@addInput');
Route::get('getAllDataPort/{id}','ProfileController@getDataPort');
Route::get('deletePort/{id}','ProfileController@deletePort');
Route::post('addPqStudent','ProfileController@addPqStudent');

//employer routes
Route::get('/employer','PagesController@employerHome')->middleware('EmployerRole');
Route::get('/job/create','JobController@showForm')->middleware('EmployerRole');;
Route::post('/job/create','JobController@create');
Route::post('/courseId','JobController@getCategory');
Route::post('/getJobs','JobController@getAllJobs');
Route::get('/editJob/{id}/course/{course_id}','JobController@editJob')->middleware('EmployerRole');;
Route::post('/updateJob','JobController@updateJob');
Route::post('/studentCategory','JobController@studentByCategory');
Route::get('job/delete/{id}', 'JobController@destroy')->middleware('EmployerRole');;
Route::post('/profileStudent','JobController@showStudent');
Route::get('/PortFolioStudent/{id}','JobController@showPortfolio')->middleware('EmployerRole');
Route::post('/addPq','JobController@addPq')->middleware('EmployerRole');
// Route::get('/PersonalQuestions','JobController@personalQuistionsIndex')->middleware('EmployerRole');

//placement routes
Route::group(['middleware' => 'PlacementRole'],function(){
    Route::get('/placement','PagesController@placementHome');
    Route::get('/allStudent','EditController@allStudent');
    Route::get('/allJobs','EditController@allJobs');
    Route::get('/cv','EditController@addCvFormat');
    Route::get('/addStudents','EditController@addStudents');
    Route::get('/addEmployers','EditController@addEmployers');
    Route::get('/addGrades','EditController@addGrades');
   Route::get('/portFolio/{id}','EditController@showPortfolio');
});

Route::post('/sendMessage','MessageController@sendMessage');
Route::post('/CreateStudent','EditController@createStudents')->name('upload.students');
Route::post('/CreateEmployers','EditController@createEmployers')->name('upload.employers');
Route::post('/CreateGrades','EditController@createGrades')->name('upload.grades');
Route::post('/getCategory','EditController@getCategory');
Route::post('/confirm','MessageController@confirm');

Route::post('/cv-upload','EditController@uploadCvFormat')->name('upload.cvFormat');;



//admin routes
Route::group(['middleware' => 'AdminRole'],function(){
Route::get('/admin','PagesController@adminHome');
Route::get('/createCourse','EditController@createCourseIndex');
Route::get('/allStudents','EditController@allStudent');
Route::get('/allJobPosts','EditController@allJobs');
Route::get('/Courses','EditController@allCourses');
Route::get('/addPlacement','EditController@addPlacementIndex');
//Route::get('/allCourses','EditController@allCourses');
});
Route::post('/editCourse','EditController@editCourse');
Route::post('/editCategory','EditController@editCategory');
Route::post('/createCourse','EditController@createCourse');
Route::post('/disabled','EditController@disabled');
Route::post('/CreatePlacement','EditController@createPlacement')->name('upload.placement');
Route::delete('/deleteCourse','EditController@deleteCourse');
Route::delete('/deleteCategory','EditController@deleteCategory');



//global routes
Route::post('/addLike','LikeController@insert');
Route::get('/buildProfile/{id}','ProfileController@showWizardProfile');
Route::get('/getMessage/{id}/{type}','MessageController@getMessages');
Route::get('/getMessageCount/{id}','MessageController@getCountMessages');
Route::post('/confirmMessages','MessageController@confirmMessages');
Route::get('/status','StatusController@getStatus')->middleware('cors');;
Route::post('/SaveTheDate','LikeController@saveThedate');
Route::post('/status','LikeController@updateStatus');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

