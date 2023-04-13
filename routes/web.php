<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webSiteController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\WorkController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\OfferController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\FeatureController;
use App\Http\Controllers\admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->name('admin.')->middleware('auth' , 'cheack_user')->group(function () {

    Route::get('index', [AdminController::class , 'index'])->name('index');

    Route::get('works/trash', [WorkController::class, 'trash'])->name('works.trash');
    Route::get('works/{id}/restore', [WorkController::class, 'restore'])->name('works.restore');
    Route::delete('works/{id}/forcedelete', [WorkController::class, 'forcedelete'])->name('works.forcedelete');
    Route::resource('works', WorkController::class);

    Route::get('offers/trash', [OfferController::class, 'trash'])->name('offers.trash');
    Route::get('offers/{id}/restore', [OfferController::class, 'restore'])->name('offers.restore');
    Route::delete('offers/{id}/forcedelete', [OfferController::class, 'forcedelete'])->name('offers.forcedelete');
    Route::resource('offers', OfferController::class);

    Route::get('teams/trash', [TeamController::class, 'trash'])->name('teams.trash');
    Route::get('teams/{id}/restore', [TeamController::class, 'restore'])->name('teams.restore');
    Route::delete('teams/{id}/forcedelete', [TeamController::class, 'forcedelete'])->name('teams.forcedelete');
    Route::resource('teams', TeamController::class);

    Route::get('features/trash', [FeatureController::class, 'trash'])->name('features.trash');
    Route::get('features/{id}/restore', [FeatureController::class, 'restore'])->name('features.restore');
    Route::delete('features/{id}/forcedelete', [FeatureController::class, 'forcedelete'])->name('features.forcedelete');
    Route::resource('features', FeatureController::class);

    Route::get('blogs/trash', [blogController::class, 'trash'])->name('blogs.trash');
    Route::get('blogs/{id}/restore', [BlogController::class, 'restore'])->name('blogs.restore');
    Route::delete('blogs/{id}/forcedelete', [BlogController::class, 'forcedelete'])->name('blogs.forcedelete');
    Route::resource('blogs', BlogController::class);

    Route::get('contacts/trash', [ContactController::class, 'trash'])->name('contacts.trash');
    Route::get('contacts/{id}/restore', [ContactController::class, 'restore'])->name('contacts.restore');
    Route::delete('contacts/{id}/forcedelete', [ContactController::class, 'forcedelete'])->name('contacts.forcedelete');
    Route::resource('contacts', ContactController::class);

    Route::get('clients/trash', [ClientController::class, 'trash'])->name('clients.trash');
    Route::get('clients/{id}/restore', [ClientController::class, 'restore'])->name('clients.restore');
    Route::delete('clients/{id}/forcedelete', [ClientController::class, 'forcedelete'])->name('clients.forcedelete');
    Route::resource('clients', ClientController::class);

    Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::get('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('categories/{id}/forcedelete', [CategoryController::class, 'forcedelete'])->name('categories.forcedelete');
    Route::resource('categories', CategoryController::class);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('not_allowed', 'not_allowed');

Route::get('/', [webSiteController::class , 'home'])->name('webSite.index');

Route::get('/about', [webSiteController::class , 'about'])->name('webSite.about');

Route::get('/service', [webSiteController::class , 'service'])->name('webSite.service');

Route::get('/blog', [webSiteController::class , 'blog'])->name('webSite.blog');

Route::get('/work', [webSiteController::class , 'work'])->name('webSite.work');

Route::get('/offer', [webSiteController::class , 'offer'])->name('webSite.offer');


