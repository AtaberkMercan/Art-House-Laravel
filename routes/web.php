<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminPanel\AdminArtController;
use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\AdminPanel\MessageController;
use App\Http\Controllers\AdminPanel\FaqController;
use App\Http\Controllers\AdminPanel\CommentController;
use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserArtController;
use App\Http\Controllers\UserImageController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//************************************HOME PAGE ROUTES ***************************************/
    Route::get('/home',[HomeController::class,'index'])->name('home');
    Route::get('/about',[HomeController::class,'about'])->name('about');
    Route::get('/contact',[HomeController::class,'contact'])->name('contact');
    Route::get('/references',[HomeController::class,'references'])->name('references');
    Route::get('/faq',[HomeController::class,'faq'])->name('faq');
    Route::get('/art/{id}',[HomeController::class,'art'])->name('art');
    Route::post('/storemessage',[HomeController::class,'storemessage'])->name('storemessage');
    Route::get('/product/{id}',[HomeController::class,'art'])->name('art');
    Route::get('/categoryarts/{id}/{slug}',[HomeController::class,'categoryarts'])->name('categoryarts');
    Route::post('/storecomment',[HomeController::class,'storecomment'])->name('storecomment');
    Route::view('/loginuser','home.login')->name('loginuser');
    Route::view('/registeruser','home.register')->name('registeruser');
    Route::get('/logoutuser',[HomeController::class,'logout'])->name('logoutuser');
    Route::view('/loginadmin','admin.login')->name('loginadmin');
    Route::post('/loginadmincheck',[HomeController::class,'loginadmincheck'])->name('loginadmincheck');
    Route::get('/artuser/{id}',[HomeController::class,'artuser'])->name('artuser');



Route::middleware('auth')->group(function(){
   //********************************USER ROUTES ***********************//
    Route::prefix('userpanel')->name('userpanel.')->controller(UserController::class)->group(function(){
            Route::get('/','index')->name('index');
            Route::get('/myreviews','myreviews')->name('myreviews');
            Route::get('/destroyreview/{id}','destroyreview')->name('destroyreview');

    });
//********************************USER PANEL ARTS ***********************//
    Route::prefix('/artt')->name('artt.')->controller(UserArtController::class)->group(function (){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/show/{id}','show')->name('show');
        Route::get('/destroy/{id}','destroy')->name('destroy');
    });
    //********************************USER PANEL IMAGE GALLERY***********************//
    Route::prefix('/image')->name('image.')->controller(UserImageController::class)->group(function (){
        Route::get('/{pid}','index')->name('index');
        Route::post('/store/{pid}','store')->name('store');
        Route::get('/destroy/{pid}/{id}','destroy')->name('destroy');
    });

//************************************ADMIN PANEL ROUTES ***************************************/
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function (){
    Route::get('/',[AdminHomeController::class,'index'])->name('admin');
           //*****************************ADMIN CATEGORY ROUTES**************//
           Route::prefix('/category')->name('category.')->controller(AdminCategoryController::class)->group(function (){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/show/{id}','show')->name('show');
            Route::get('/destroy/{id}','destroy')->name('destroy');
        });
                //**************************************ADMIN GENERAL ROUTES  ***************//
                Route::get('/setting',[AdminHomeController::class,'setting'])->name('setting');
                Route::post('/setting',[AdminHomeController::class,'settingupdate'])->name('setting.update');

               //*****************************ADMIN ART ROUTES**************//
               Route::prefix('/art')->name('art.')->controller(AdminArtController::class)->group(function (){
                Route::get('/','index')->name('index');
                Route::get('/create','create')->name('create');
                Route::post('/store','store')->name('store');
                Route::get('/edit/{id}','edit')->name('edit');
                Route::post('/update/{id}','update')->name('update');
                Route::get('/show/{id}','show')->name('show');
                Route::get('/destroy/{id}','destroy')->name('destroy');
            });
             //*****************************ADMIN IMAGE GALLERY ROUTES**************//
        Route::prefix('/image')->name('image.')->controller(ImageController::class)->group(function (){
            Route::get('/{pid}','index')->name('index');
            Route::post('/store/{pid}','store')->name('store');
            Route::get('/destroy/{pid}/{id}','destroy')->name('destroy');
        });
         //*****************************ADMIN Messages ROUTES**************//
         Route::prefix('/message')->name('message.')->controller(MessageController::class)->group(function (){
            Route::get('/','index')->name('index');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
        });
         //***************************** Admin Faq  ROUTES**************//
         Route::prefix('/faq')->name('faq.')->controller(FaqController::class)->group(function (){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/show/{id}','show')->name('show');
            Route::get('/destroy/{id}','destroy')->name('destroy');
        });
         //*****************************ADMIN COMMENT ROUTES**************//
         Route::prefix('/comments')->name('comment.')->controller(CommentController::class)->group(function (){
            Route::get('/','index')->name('index');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
        });
        //*****************************ADMIN USER ROUTES**************//
        Route::prefix('/user')->name('user.')->controller(AdminUserController::class)->group(function (){
            Route::get('/','index')->name('index');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::get('/show/{id}','show')->name('show');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::post('/addrole/{id}','addrole')->name('addrole');
            Route::get('/destroyrole/{uid}/{rid}','destroyrole')->name('destroyrole');
        });
    });  
});
